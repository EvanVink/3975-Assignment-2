//! This file is for API calls to the backend

import { Article } from '../models/Article';
import Config from '../config/index';

export const fetchArticles = {

    /**
     * Fetching all articles from the API.
     * 
     * @returns all articles
     */
    getAllArticles: async (): Promise<Article[]> => {

        try {

            //Sending GET request to API to fetch all articles.
            const response = await fetch(`${Config.API_BASE_URL}/article`);
            
            if(!response.ok) {
                throw new Error(`Failed to fetch articles (Check ArticleService.ts) ${response.status}`);
            }

            //Parsing the response body as JSON (list of articles) and return it.
            const data = await response.json();
            return data;

        } catch (error) {
            console.error(`Error fetching articles (try failed in ArticleService)`, error);
            return [];
        }
    },


    /**
     * Fetching a single article by its ID.
     * 
     * @param articleId article id an integer
     * @returns article corresponding to the article id
     */
    getArticleById: async (articleId: number): Promise<Article> => {

        try {
            //Sending GET request to API to fetch an article by its ID
            const response = await fetch (`${Config.API_BASE_URL}/article/${articleId}`);
    
            if (!response.ok) {
                throw new Error(`Failed to fetch article by article Id (Check ArticleService.ts) ${response.status}`);
            }
    
            return await response.json();

        } catch (error) {
            console.error(`Error fetching article by article Id (try failed in ArticleSevice)`, error);
            throw error;
             //Return an empty object cast as Article.
            return {} as Article;
        }
    }
};  


