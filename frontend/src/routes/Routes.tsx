//! This file is for Routing

import { createBrowserRouter } from "react-router-dom";
import ArticleListPage from "../pages/ArticleListPage";
import ArticleDetailPage from "../pages/ArticleDetailPage";
import App from "../App";

/**
 * Define the application's routes.
 */
export const router = createBrowserRouter([
  {
    path: "/",
    element: <App />,
    children: [
      {
        //! Add a new route for the article list page.
        path: "/",
        element: <ArticleListPage />
      },
      {
        //! Add a new route for the article detail page.
        path: "/:id",
        element: <ArticleDetailPage />
      }
    ],
  },
]);
