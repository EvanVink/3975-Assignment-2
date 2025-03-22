//! This file is for page layout of ArticleListPage

import ArticleList from "../components/ArticleList";

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