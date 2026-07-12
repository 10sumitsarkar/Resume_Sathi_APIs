import './globals.css';
import type { Metadata } from 'next';

export const metadata: Metadata = {
  title: 'Resume Sathi Articles',
  description: 'Browse articles from Resume Sathi API',
};

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en">
      <body>{children}</body>
    </html>
  );
}
