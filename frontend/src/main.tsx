//! This file is for main app structure

import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import { RouterProvider } from 'react-router-dom'
import './index.css'
import { router } from './routes/Routes'
import 'bootstrap/dist/css/bootstrap.min.css';

/**
 * Creating root element and render the app inside it.
 */
createRoot(document.getElementById('root')!).render(
  <StrictMode>
    {/* Providing the router configuration to handle app routing. */}
    <RouterProvider router={router} />
  </StrictMode>,
)
