import { useState, useEffect } from "react";
import { Article } from "../models/Article";
import { ArticleDetailProperty } from "../models/Article";
import { fetchArticles } from "../services/ArticleService";

/**
 * ArticleDetail component fetches and displays the details of a single article corresponding to the provided `articleId`.
 * Handles different states:
 *      Displays a loading spinner while fetching articles if taking some time.
 *      Shows an error message if fetching fails.
 *      Displays a message if no article are available.
 *      Displays the article body using `dangerouslySetInnerHTML`.
 * 
 * @param param0 The ID of the article to fetch.
 * @returns The rendered article details or error/loading states.
 */
const ArticleDetail = ({ articleId }: ArticleDetailProperty) => {

  //Storing single article, loading state, and error messages.
  const [article, setArticle] = useState<Article | null>(null);
  const [loading, setLoading] = useState<boolean>(true);
  const [error, setError] = useState<string | null>(null);

    //'useEffect' runs once when the component mounts to fetch articles from the API.
    useEffect(() => {

        //Fetching one article corresponding to the articleId from the API.
        const fetchArticle = async () => {
            try {

                setLoading(true);

                //Fetching articles from API. (Function defined in services/ArticleService.ts)
                const data = await fetchArticles.getArticleById(articleId);
                setArticle(data);

                setError(null);

            } catch (error) {

                console.error("Error fetching articles (try failed in ArticleDetail.tsx)",error);
                setError("Error fetching articles (catch failed in ArticleDetail.tsx)");

            } finally {
                setLoading(false);
            }
        };

        //Retrieve article data when the effect run.
        fetchArticle();
    }, [articleId]);    //Run again this effect when articleId changes.


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


    //Displaying an error message if the article is not found.
    if (!article) {
        return (
        <div className="alert alert-warning my-4" role="alert">
            Article not found.
        </div>
        );
    }

    //Displaying the article corresponding to the articleId.
    return (
        <div className="main">
        <h1 className="index_h1">{article.Title}</h1>
        <h5 className="date">
            <i>
            Posted on {article.StartDate} by {article.ContributorUsername}

            {/* //! Fix this line to display the contributor's first and last name. */}
            {/* Posted on {article.StartDate} by {article.FirstName}{" "}
            {article.LastName} */}
            </i>
        </h5>
        {/* 'dangerouslySetInnerHTML' allows raw HTML from article. */}
        <div
            className="mainBody"
            dangerouslySetInnerHTML={{ __html: article.Body }}
        />
        </div>
    );
};

export default ArticleDetail;
