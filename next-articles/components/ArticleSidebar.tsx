'use client';

import { Article, Category } from '@/types';

interface SidebarProps {
  latest: Article[];
  categories: Category[];
  selectedCategory: string;
  onCategorySelect: (categoryId: string) => void;
  onClearCategory: () => void;
}

export default function ArticleSidebar({ latest, categories, selectedCategory, onCategorySelect, onClearCategory }: SidebarProps) {
  return (
    <div className="card">
      <div className="sidebar-section">
        <section>
          <h3>Search</h3>
          <p>Use the search box on the articles page to filter posts.</p>
        </section>

        <section>
          <h3>Latest articles</h3>
          <ul>
            {latest.map((item) => (
              <li key={item.id}>
                <a href={`/articles/${item.slug}`}>{item.article_title || item.title}</a>
              </li>
            ))}
          </ul>
        </section>

        <section>
          <h3>Categories</h3>
          {selectedCategory && (
            <button type="button" className="button" onClick={onClearCategory}>
              Clear category
            </button>
          )}
          <ul>
            {categories.map((category) => (
              <li key={category.id}>
                <button type="button" className="button" onClick={() => onCategorySelect(String(category.id))}>
                  {category.name}
                </button>
              </li>
            ))}
          </ul>
        </section>
      </div>
    </div>
  );
}
