import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';

function App() {
    return <h1>Hello React in Laravel 🚀</h1>;
}

const el = document.getElementById('app');
if (el) {
    ReactDOM.createRoot(el).render(<App />);
}