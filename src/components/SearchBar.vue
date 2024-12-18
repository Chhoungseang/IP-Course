<template>
    <div class="container">
        <div class="cat-wrapper">
            <p class="category lato-bold">All Categories</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" fill="gray"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>
            <svg width="2" height="16" viewBox="0 0 2 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="1.25065" y1="0.5" x2="1.25065" y2="15.5" stroke="#CACACA" stroke-width="0.881308"/>
            </svg>
        </div>
        <input type="search" size="40" placeholder="Search for items">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" fill="gray"><path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z"></path></svg>
    </div>
    </template>
    <style scoped>
    .container {
        display: flex;
        width: 700px;
        height: 50px;
        border: 2px solid #BCE3C9;
        align-items: center;
        justify-content: space-evenly;
        padding: 12px;
        box-sizing: border-box;
        border-radius: 5px;
    }
    input[type=search] {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        outline: none;
        border: none;
        
    }
    .cat-wrapper {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-evenly;
        column-gap: 12px;
    }
    .category {
        font-size: 14px;
    }
    </style>