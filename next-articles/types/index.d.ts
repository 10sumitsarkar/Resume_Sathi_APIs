export interface Category {
  id: number;
  name: string;
  slug?: string;
  description?: string;
}

export interface Article {
  id: number;
  title?: string;
  article_title?: string;
  slug: string;
  description?: string;
  category?: Category;
  status?: string;
  created_at: string;
  updated_at?: string;
  contents?: Array<{ content: string }>;
  language?: {
    id: number;
    title: string;
  };
  comments?: Comment[];
}

export interface Comment {
  id: number;
  name: string;
  email?: string;
  text: string;
  created_at: string;
}
