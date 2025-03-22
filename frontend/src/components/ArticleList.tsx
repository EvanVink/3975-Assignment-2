//! This file is for UI component of ArticleList

import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { Article } from "../models/Article";
import { fetchArticles } from "../services/ArticleService";

const ArticleList = () => {

    const [articles, setArticles] = useState<Article[]>([]);
    const [loading, setLoading]   = useState<boolean>(true);
    const [error, setError]       = useState<string | null>(null);


    useEffect(() => {

        //Fetching all articles from the API
        const getArticles = async () => {

            try{
                setLoading(true);

                const data = await fetchArticles.getAllArticles();
                setArticles(data);
                setError(null);

            } catch (error) {
                console.error("Error fetching articles (try failed in ArticleList)", error);
                setError("Error fetching articles (catch failed in ArticleList)");
                
            } finally {
                setLoading(false);
            }
        };

        getArticles();
    }, []);


    if (loading) {
        return (
            <div className="text-center my-5">
                <div className="spinner-border text-primary" role="status">
                    <span className="visually-hidden">Loading...</span>
                </div>
            </div>
        );
    }
  

    if (error) {
        return (
            <div className="alert alert-danger my-4" role="alert">
                {error}
            </div>
        );
    }

    if (articles.length === 0) {
        return (
            <div className="alert alert-info my-4" role="alert">
                No articles available at this time. Retrieved article length is 0.
            </div>
        );
    }

    return (
        <div className="articles-grid">
            {articles.map(article => {
                const truncatedBody = article.Body.substring(0, 100) + "...";

                return (
                    <div key={article.ArticleId} className="card border-secondary mb-3 article-card">
                        <h5 className="card-header">{article.Title}</h5>
                        <div className="card-body">
                            <h5 className="card-title">
                                {article.ContributorUsername} - {article.StartDate}
                            </h5>
                            <p className="card-text cardText">
                                {truncatedBody} <Link to={`/article/${article.ArticleId}`} className="cardButton">Read More</Link>
                            </p>
                        </div>
                    </div>
                );
            })}
        </div>
    );
};

export default ArticleList;