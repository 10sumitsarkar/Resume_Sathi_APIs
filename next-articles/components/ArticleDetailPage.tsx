'use client';

import { useEffect, useMemo, useState } from 'react';
import { Article, Comment } from '@/types';

const apiBase = process.env.NEXT_PUBLIC_API_BASE || 'http://localhost:8000/api';

interface ArticleDetailPageProps {
  slug: string;
}

export default function ArticleDetailPage({ slug }: ArticleDetailPageProps) {
  const [article, setArticle] = useState<Article | null>(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState('');
  const [comments, setComments] = useState<Comment[]>([]);
  const [commentText, setCommentText] = useState('');
  const [commentName, setCommentName] = useState('');
  const [commentEmail, setCommentEmail] = useState('');
  const [submitState, setSubmitState] = useState('');

  const articleUrl = `/articles/slug/${encodeURIComponent(slug)}`;

  useEffect(() => {
    const load = async () => {
      try {
        setLoading(true);
        setError('');
        const response = await fetch(`${apiBase}${articleUrl}`);
        if (!response.ok) throw new Error('Article not found');
        const data = await response.json();
        setArticle(data);
        if (data.id) {
          await loadComments(data.id);
        }
      } catch (err) {
        setError((err as Error).message);
      } finally {
        setLoading(false);
      }
    };

    load();
  }, [slug]);

  const loadComments = async (articleId: number) => {
    try {
      const response = await fetch(`${apiBase}/article-comments?article_id=${articleId}`);
      if (!response.ok) throw new Error('Failed to load comments');
      const json = await response.json();
      setComments(json.comments || []);
    } catch (err) {
      console.error(err);
    }
  };

  const handleSubmit = async (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    if (!article) return;

    try {
      setSubmitState('submitting');
      const response = await fetch(`${apiBase}/article-comments`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          name: commentName,
          email: commentEmail,
          text: commentText,
          article_id: article.id,
        }),
      });
      if (!response.ok) {
        const json = await response.json();
        throw new Error(json.message || 'Failed to submit comment');
      }
      const saved = await response.json();
      setComments((prev) => [saved, ...prev]);
      setCommentText('');
      setCommentName('');
      setCommentEmail('');
      setSubmitState('submitted');
    } catch (err) {
      setSubmitState('error');
      setError((err as Error).message);
    }
  };

  const commentCount = useMemo(() => comments.length, [comments]);

  return (
    <main className="container">
      <div className="card">
        {loading ? (
          <div className="alert">Loading article…</div>
        ) : error ? (
          <div className="alert error">{error}</div>
        ) : article ? (
          <>
            <h1>{article.article_title || article.title}</h1>
            <div className="metadata">
              <span>{new Date(article.created_at).toLocaleDateString()}</span>
              <span>{article.category?.name || 'Uncategorized'}</span>
              <span>{article.language?.title || 'General'}</span>
            </div>
            <div className="tag">{article.status}</div>
            <div style={{ marginTop: '1.5rem' }}>
              <div dangerouslySetInnerHTML={{ __html: article.contents?.[0]?.content || '' }} />
            </div>
            <section style={{ marginTop: '2rem' }}>
              <h2>Comments ({commentCount})</h2>
              {commentCount === 0 ? (
                <p>No comments yet. Be the first to share your thoughts.</p>
              ) : (
                <div>
                  {comments.map((comment) => (
                    <div key={comment.id} className="card" style={{ marginBottom: '1rem' }}>
                      <div className="metadata">
                        <span>{comment.name}</span>
                        <span>{new Date(comment.created_at).toLocaleDateString()}</span>
                      </div>
                      <p>{comment.text}</p>
                    </div>
                  ))}
                </div>
              )}
            </section>
            <section style={{ marginTop: '2rem' }}>
              <h2>Leave a comment</h2>
              <form onSubmit={handleSubmit}>
                <div className="field">
                  <label htmlFor="name">Name</label>
                  <input
                    id="name"
                    className="input"
                    value={commentName}
                    onChange={(event) => setCommentName(event.target.value)}
                    required
                  />
                </div>
                <div className="field">
                  <label htmlFor="email">Email</label>
                  <input
                    id="email"
                    type="email"
                    className="input"
                    value={commentEmail}
                    onChange={(event) => setCommentEmail(event.target.value)}
                    required
                  />
                </div>
                <div className="field">
                  <label htmlFor="comment">Comment</label>
                  <textarea
                    id="comment"
                    className="textarea"
                    value={commentText}
                    onChange={(event) => setCommentText(event.target.value)}
                    required
                  />
                </div>
                <button type="submit" className="button">
                  {submitState === 'submitting' ? 'Posting...' : 'Submit comment'}
                </button>
                {submitState === 'submitted' && <div className="alert">Comment submitted.</div>}
              </form>
            </section>
          </>
        ) : null}
      </div>

      <footer className="footer">
        <p>Powered by Resume Sathi API.</p>
      </footer>
    </main>
  );
}
