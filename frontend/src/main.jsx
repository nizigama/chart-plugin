import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App.jsx'
import './index.css'

document.addEventListener("DOMContentLoaded", event => {
    ReactDOM.createRoot(document.getElementById('mgp_dashboard_widget')).render(
        <React.StrictMode>
            <App/>
        </React.StrictMode>,
    )
})
