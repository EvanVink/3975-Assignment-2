//! This file is for page layout of ArticlDetailPage

import { useParams } from 'react-router-dom';
import ArticleDetail from "../components/ArticleDetail";


/**
 * ArticleDetailPage component renders the page layout for displaying a single article.
 * 
 * @returns The layout of the ArticleDetailPage with the details of the article
 */
const ArticleDetailPage = () => {

    //Getting the 'id' from the URL
    const { id } = useParams<{ id:string}>();
    
    //Converting the id string to a number. If id is missing, use 0 instead.
    const articleId  = parseInt(id || '0');

    return (
        <div className="container">
            <ArticleDetail articleId={articleId} />
        </div>
    );
};

export default ArticleDetailPage;