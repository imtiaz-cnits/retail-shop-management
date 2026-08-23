# Agent Guidelines & Rules: Typography (Bengali & English)

This project requires specific typography guidelines:
- All Bengali (Bangla) text elements must render using the Google Font **TiroBangla**.
- All English text elements must render using the Google Font **BricolageGrotesque**.

## CSS Guidelines
- Always use the custom CSS variable `--primary-font` if available, which has been updated to default to `"BricolageGrotesque", "TiroBangla", sans-serif`.
- If styling manually or overriding, always specify:
  ```css
  font-family: 'BricolageGrotesque', 'TiroBangla', sans-serif;
  ```
  *(Note: Putting BricolageGrotesque first ensures English characters render in BricolageGrotesque, while Bengali characters gracefully fall back to TiroBangla).*

## HTML/Blade Guidelines
- Ensure that the Google Fonts stylesheet is linked or imported in any layout or view:
  ```html
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Tiro+Bangla:ital@0;1&display=swap" rel="stylesheet">
  ```
- Do NOT import or use Poppins or Noto Sans Bengali.


# Agent Guidelines & Rules: Skeleton Loading & Placeholders

All asynchronous data operations must implement Skeleton/Placeholder Loading instead of full-screen blocking overlays.

## Loader & Skeleton Guidelines
1. **Non-Blocking Linear Loader:**
   - The global loader overlay (`#loader` / `.LoadingOverlay`) is configured as a non-blocking 3px height top progress bar. It must never overlay or block user interactions.
2. **Auto Skeletons on Lists:**
   - All tables must render shimmer skeleton placeholders (`.skeleton-loader`) while waiting for API responses.
   - When `showLoader()` is called, it automatically injects skeleton rows into empty tables/lists (`tbody#tableList`).
3. **Manual Skeletons:**
   - For custom elements, use helper functions:
     - `showTableSkeleton(tbodyId, columnsCount, rowsCount)`
     - `showCardSkeleton(containerId)`
