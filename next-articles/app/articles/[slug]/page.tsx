import ArticleDetailPage from '@/components/ArticleDetailPage';

interface PageProps {
  params: {
    slug: string;
  };
}

export default function ArticlePage({ params }: PageProps) {
  return <ArticleDetailPage slug={params.slug} />;
}
