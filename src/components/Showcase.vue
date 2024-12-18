<template>
    <div class="container">
        <img class="showcase-bg" src="@/assets/image/Background.png" alt="">
        <img class="showcase-img" src="@/assets/image/bagofapple.png" alt="">
        <div class="label-wrapper">
            <p class="quicksand-regular label">Don't miss amazing grocery deals</p>
            <p class="lato-regular sub-label">Sign up for the daily newsletters</p>
        </div>
        <div class="email-container">
            <svg class="email-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.96714 8.43255C4.74389 8.49635 4.54115 8.61732 4.37901 8.78352C4.21686 8.94972 4.10092 9.15537 4.04266 9.38014C3.9844 9.6049 3.98584 9.84098 4.04683 10.065C4.10782 10.2891 4.22625 10.4933 4.3904 10.6575L6.66535 12.9298V17.321H11.0612L13.3515 19.608C13.4744 19.7321 13.6206 19.8306 13.7817 19.8979C13.9428 19.9652 14.1157 19.9999 14.2903 20C14.4051 19.9998 14.5193 19.985 14.6304 19.956C14.855 19.8994 15.0608 19.7846 15.227 19.6232C15.3932 19.4618 15.514 19.2595 15.5771 19.0365L20.0004 4L4.96714 8.43255ZM5.33786 9.71471L16.6913 6.36763L8.00019 15.0447V12.3777L5.33786 9.71471ZM14.299 18.6652L11.614 15.9875H8.94697L17.6367 7.30508L14.299 18.6652Z" fill="#7E7E7E"/>
            </svg>
            <input class="email-input" type="text" placeholder="Your Email Address">
            <button class="subscribe-btn quicksand-regular">Subscribe</button>
        </div>
    </div>
    </template>
    <style scoped>
    input[type=text] {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        outline: none;
        border: none; 
    }
    button {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        outline: none;
        border: none; 
    }
    .container {
        background-color: #fff2d9;
        width: 100%;
        height: 480px;
        padding: 20px 120px;
        box-sizing: border-box;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        position: relative;
        z-index: 0;
    }
    .label-wrapper {
        margin-bottom: 40px;
    }
    .label-wrapper > p {
        margin: 20px 0 30px 0;
    }
    .label {
        width: 50%;
        font-size: 52px;
        color: #253D4E;
    }
    .sub-label {
        font-size: 30px;
        color: #7e7e7e;
    }
    .email-container {
        position: relative;
        align-items: center;
        width: 260px;
        background: white;
        border-radius: 30px;
        padding: 0 20px;
    }
    .email-input {
        height: 50px;
        width: 200px;
        padding: 0 50px;
        border-radius: 30px;
    }
    .email-icon {
        position: absolute;
        transform: translate(0, 12px);
    }
    .subscribe-btn {
        width: 150px;
        height: 50px;
        background-color: #3bb77e;
        color: white;
        border-radius: 30px;
        position: absolute;
        transform: translateX(-20%);
        cursor: pointer;
    }
    .showcase-img {
        position: absolute;
        width: 900px;
        right: 0;
        transform: translate(0, -20px);
        z-index: -50;
    }
    .showcase-bg {
        position: absolute;
        width: 100%;
        top: 0;
        left: 0;
    }
    </style>