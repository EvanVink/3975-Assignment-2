//! This file is for UI component of ArticleList

import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { Article } from "../models/Article";
import { fetchArticles } from "../services/ArticleService";

/**
 * Fetches articles from the API and displays them in a grid layout.
 * Handles different states:
 *      Displays a loading spinner while fetching articles if taking some time.
 *      Shows an error message if fetching fails.
 *      Displays a message if no articles are available.
 *      Renders each article with a truncated body and a "Read More" link.
 * 
 * @returns ArticleList component
 */
const ArticleList = () => {

    //Storing articles, loading state, and error messages.
    const [articles, setArticles] = useState<Article[]>([]);
    const [loading, setLoading]   = useState<boolean>(true);
    const [error, setError]       = useState<string | null>(null);


    //'useEffect' runs once when the component mounts to fetch articles from the API.
    useEffect(() => {

        //Fetching all articles from the API.
        const getArticles = async () => {

            try{
                setLoading(true);

                //Fetching articles from API. (Function defined in services/ArticleService.ts)
                const data = await fetchArticles.getAllArticles();
                //Updating state with fetched articles.
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

    //Displaying a loading spinner while fetching data.
    if (loading) {
        return (
            <div className="text-center my-5">
                <div className="spinner-border text-primary" role="status">
                    <span className="visually-hidden">Loading...</span>
                </div>
            </div>
        );
    }
  
    //Displaying an error message if fetching data fails.
    if (error) {
        return (
            <div className="alert alert-danger my-4" role="alert">
                {error}
            </div>
        );
    }

    //Displaying this message if there are no articles available (Api call returns 0 articles).
    if (articles.length === 0) {
        return (
            <div className="alert alert-info my-4" role="alert">
                No articles available at this time. Retrieved article length is 0.
            </div>
        );
    }

    //Displaying articles in a grid layout.
    return (
        <div className="articles-grid">
            
            {/* articles state variable is holding the list of articles fetched from the API. */}
            {articles.map(article => {

                //Truncate the body of the article to 100 characters.
                const truncatedBody = article.Body.substring(0, 100) + "...";
                
                //Each article is wrapped inside a card.
                return (
                    <div key={article.ArticleId} className="card border-secondary mb-3 article-card">
                       
                        <h5 className="card-header">{article.Title}</h5>

                        <div className="card-body">
                            <h5 className="card-title">
                                {article.ContributorUsername} - {article.StartDate}
                            </h5>
                            <p className="card-text cardText">
                                {truncatedBody} <Link to={`/${article.ArticleId}`} className="cardButton">Read More</Link>
                            </p>
                        </div>

                    </div>
                );
            })}

        </div>
    );


};

export default ArticleList;