'use client';

import { useEffect, useMemo, useState } from 'react';
import ArticleSidebar from './ArticleSidebar';
import { Article, Category } from '@/types';

const apiBase = process.env.NEXT_PUBLIC_API_BASE || 'http://localhost:8000/api';

export default function ArticleListPage() {
  const [search, setSearch] = useState('');
  const [selectedCategory, setSelectedCategory] = useState<string>('');
  const [articles, setArticles] = useState<Article[]>([]);
  const [latest, setLatest] = useState<Article[]>([]);
  const [categories, setCategories] = useState<Category[]>([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');

  const fetchArticles = async (overrideSearch?: string, categoryId?: string) => {
    try {
      setLoading(true);
      setError('');
      const params = new URLSearchParams();
      if (overrideSearch) params.set('search', overrideSearch);
      if (categoryId) params.set('category_id', categoryId);
      const url = `${apiBase}/articles?${params.toString()}`;
      const response = await fetch(url);
      if (!response.ok) throw new Error('Failed to load articles');
      setArticles(await response.json());
    } catch (err) {
      setError((err as Error).message);
    } finally {
      setLoading(false);
    }
  };

  const fetchLatest = async () => {
    try {
      const response = await fetch(`${apiBase}/articles/latest?limit=5`);
      if (!response.ok) throw new Error('Failed to load latest articles');
      setLatest(await response.json());
    } catch (err) {
      console.error(err);
    }
  };

  const fetchCategories = async () => {
    try {
      const response = await fetch(`${apiBase}/article-categories`);
      if (!response.ok) throw new Error('Failed to load categories');
      setCategories(await response.json());
    } catch (err) {
      console.error(err);
    }
  };

  useEffect(() => {
    fetchArticles();
    fetchLatest();
    fetchCategories();
  }, []);

  const filteredArticles = useMemo(() => articles, [articles]);

  return (
    <main className="container">
      <div className="grid grid-3">
        <section>
          <div className="card">
            <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center' }}>
              <div>
                <h1>Articles</h1>
                <p>Browse published articles with search and category filters.</p>
              </div>
            </div>

            <div className="field">
              <label htmlFor="search">Search articles</label>
              <input
                id="search"
                value={search}
                className="input"
                placeholder="Search by title, subtitle or description"
                onChange={(event) => {
                  setSearch(event.target.value);
                  fetchArticles(event.target.value, selectedCategory);
                }}
              />
            </div>

            {selectedCategory && (
              <div className="field">
                <span className="badge">Category: {selectedCategory}</span>
              </div>
            )}

            {loading && <div className="alert">Loading articles…</div>}
            {error && <div className="alert error">{error}</div>}

            {filteredArticles.length === 0 && !loading ? (
              <div className="alert">No articles found.</div>
            ) : (
              filteredArticles.map((article) => (
                <article key={article.id} className="card" style={{ marginBottom: '1rem' }}>
                  <h2>{article.article_title || article.title}</h2>
                  <div className="metadata">
                    <span>{new Date(article.created_at).toLocaleDateString()}</span>
                    <span className="tag">{article.category?.name || 'Uncategorized'}</span>
                  </div>
                  <p>{article.description || 'No description available.'}</p>
                  <a className="button" href={`/articles/${article.slug}`}>
                    Read article
                  </a>
                </article>
              ))
            )}
          </div>
        </section>

        <aside className="sidebar-section">
          <ArticleSidebar
            latest={latest}
            categories={categories}
            selectedCategory={selectedCategory}
            onCategorySelect={(categoryId) => {
              setSelectedCategory(categoryId);
              fetchArticles(search, categoryId);
            }}
            onClearCategory={() => {
              setSelectedCategory('');
              fetchArticles(search, '');
            }}
          />
        </aside>
      </div>

      <footer className="footer">
        <p>Powered by Resume Sathi API.</p>
      </footer>
    </main>
  );
}
