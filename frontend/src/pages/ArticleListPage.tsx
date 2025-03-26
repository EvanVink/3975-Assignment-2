//! This file is for page layout of ArticleListPage

import ArticleList from "../components/ArticleList";

/**
 * ArticleListPage component renders the page layout for displaying articles.
 * 
 * @returns The layout of the ArticleListPage with the list of articles
 */
const ArticleListPage = () => {
    return (
        <div className="back">
        <div className="articles-container">
          <h1 className="mainText">Articles</h1>
          <ArticleList />
        </div>
      </div>
    );
};

export default ArticleListPage;