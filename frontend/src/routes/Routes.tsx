//! This file is for Routing

import { createBrowserRouter } from "react-router-dom";
import UnauthorizedPage from "../pages/401Page";
import ArticleListPage from "../pages/ArticleListPage";
import App from "../App";

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
        //! Add a new route for the 401 page
        path: "/401",
        element: <UnauthorizedPage />
      },
    ],
  },
]);
