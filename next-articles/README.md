# Resume Sathi Articles frontend

This is a lightweight Next.js frontend for the Resume Sathi API.

## Setup

1. Install dependencies
   ```bash
   npm install
   ```
2. Create `.env.local` to set the API base URL if needed:
   ```bash
   NEXT_PUBLIC_API_BASE=http://localhost:8000/api
   ```
3. Run locally
   ```bash
   npm run dev
   ```

## Pages

- `/` - Article listing and search
- `/articles/[slug]` - Article detail, comments, latest posts, categories
