<?php
session_start();
require_once("includes/db.php");
require_once("social-config.php");
?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">

<head>
    <title><?= $site_name; ?>Graphics & Design</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $site_desc; ?>">
    <meta name="keywords" content="<?= $site_keywords; ?>">
    <meta name="author" content="<?= $site_author; ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/custom.css" rel="stylesheet"> <!-- Custom css code from modified in admin panel --->
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/categories_nav_styles.css" rel="stylesheet">
    <link href="font_awesome/css/font-awesome.css" rel="stylesheet">
    <link href="styles/owl.carousel.css" rel="stylesheet">
    <link href="styles/owl.theme.default.css" rel="stylesheet">
    <link href="styles/sweat_alert.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="">


    <script src="js/ie.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="js/sweat_alert.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a39d50ac9681a6c"></script>
    <style>
        .page-container {
            /* display: flex; */
            margin-top: 11rem;
        }

        /* 
        header {
            background-color: #fff;
            padding: 10px 0;
        } */

        /* nav ul {
            list-style: none;
            display: flex;
            justify-content: space-evenly;
        } */

        /* nav ul li {
            margin: 0 15px;
        } */

        /* nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        } */

        .banner {
            background-color: #004d26;
            color: white;
            padding: 50px 0;
            text-align: center;
        }

        .banner h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .banner p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .banner button {
            background-color: white;
            color: #004d26;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .popular-categories {
            padding: 40px 0;
            text-align: center;
        }

        .popular-categories h2 {
            font-size: 24px;
            margin-bottom: 30px;
        }

        .categories {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .category-item {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        }

        .category-item:hover {
            background-color: #e6e6e6;
        }

        .u-wrapper {
            max-width: 1440px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            width: 100%;
            padding: 15px;
        }

        .c-carousel {
            /* overflow: hidden; */
            position: relative;
            width: 100%;
        }

        .c-carousel__wrapper.swiper {
            margin: 0 48px;
            position: static;
        }

        .c-carousel__inner-wrapper.swiper-wrapper {
            display: flex;
            align-items: center;
            /* overflow: hidden; */
        }

        .c-carousel img {
            margin: 0 auto;
        }

        .c-carousel__controls {
            position: absolute;
            inset: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            overflow: hidden;
        }

        .c-carousel__button--next,
        .c-carousel__button--prev {
            cursor: pointer;
        }

        .c-carousel__button--prev.swiper-button-disabled,
        .c-carousel__button--next.swiper-button-disabled {
            opacity: 0.35;
            cursor: auto;
            pointer-events: none;
        }

        .c-carousel__item.swiper-slide {
            max-width: 300px;
            width: auto;
            background-color: #eeebeb6e;
            border-radius: 5px;
            padding: 5px 8px;
            flex-shrink: 0;
        }










        .seeking-services {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px;
            background-color: #fdfdfd;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .seeking-content {
            max-width: 50%;
        }

        .seeking-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .seeking-content p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .service-tags {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .service-tags span {
            background-color: #ffe7e7;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 14px;
            color: #b04b4b;
        }

        .browse-btn {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .browse-btn:hover {
            background-color: #333;
        }

        .seeking-image img {
            max-width: 100%;
            border-radius: 10px;
        }




        .explore-section {
            padding: 30px;
            background-color: #f9f9f9;
        }

        .explore-section h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .explore-grid {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .explore-item {
            flex: 1;
            text-align: left;
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .explore-item img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .explore-item h3 {
            font-size: 18px;
            margin-top: 10px;
        }

        .explore-item p {
            font-size: 14px;
            color: #777;
        }





        /*start styles*/
        .accordion {
            display: flex;
            flex-direction: column;
            padding: 30px;
            gap: 10px;
            width: 100%;
            margin: auto;

        }

        .accordion__item {
            border: 1px solid #e5f3fa;
            border-radius: 10px;
            overflow: hidden;
        }

        .accordion__header {
            padding: 20px 25px;
            font-weight: 600;
            cursor: pointer;
            position: relative;
        }

        .accordion__header::after {
            content: "";
            background: url(https://www.svgrepo.com/show/357035/angle-down.svg) no-repeat center;
            width: 20px;
            height: 20px;
            transition: 0.4s;
            display: inline-block;
            position: absolute;
            right: 20px;
            top: 20px;
            z-index: 1;
        }

        .accordion__header.active {
            background: #e5f3fa;
        }

        .accordion__header.active::after {
            transform: rotateX(180deg);
        }

        .accordion__item .accordion__content {
            padding: 0 25px;
            max-height: 0;
            transition: 0.5s;
            overflow: hidden;
        }

        .graphic-design-headingfaq {

            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;

        }
    </style>
</head>


<body class="is-responsive">
    <?php require_once("includes/header.php"); ?>

    <div class="page-container">
        <!-- Navbar -->
        <div class="u-wrapper">
            <div class="c-carousel">
                <div class="c-carousel__wrapper swiper">
                    <div class="c-carousel__inner-wrapper swiper-wrapper">
                        <div class="c-carousel__item swiper-slide"><a href="#">Graphics & Design</a></div>
                        <div class="c-carousel__item swiper-slide"><a href="#">Programming & Tech</a></div>
                        <div class="c-carousel__item swiper-slide"><a href="#">Digital Marketing</a></div>
                        <div class="c-carousel__item swiper-slide"><a href="#">Video & Animation</a></div>
                        <div class="c-carousel__item swiper-slide"><a href="#">Writing & Translation</a></div>
                        <div class="c-carousel__item swiper-slide"><a href="#">Music & Audio</a></div>
                        <div class="c-carousel__item swiper-slide"><a href="#">Business</a></div>
                        <div class="c-carousel__item swiper-slide"><a href="#">Finance</a></div>
                        <div class="c-carousel__item swiper-slide"><a href="#">AI Services</a></div>
                    </div>

                </div>
                <div class="c-carousel__controls" style="--swiper-navigation-color: pink;">
                    <div class="c-carousel__button--prev"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 8 8 12 12 16"></polyline>
                            <line x1="16" y1="12" x2="8" y2="12"></line>
                        </svg></div>
                    <div class="c-carousel__button--next"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 16 16 12 12 8"></polyline>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg></div>
                </div>
            </div>

        </div>

        <!-- Banner Section -->
        <section class="banner">
            <div class="banner-content">
                <h1>Graphics & Design</h1>
                <p>Designs to make you stand out.</p>
                <button>How It Works</button>
            </div>
        </section>

        <!-- Popular Categories -->
        <section class="popular-categories">
            <h2>Most popular in Graphics & Design</h2>
            <div class="categories">
                <div class="category-item">Minimalist Logo Design</div>
                <div class="category-item">Illustration</div>
                <div class="category-item">Website Design</div>
                <div class="category-item">Architecture & Interior Design</div>
                <div class="category-item">AI Artists</div>
            </div>
        </section>


        <!-- Seeking a Full Suite of Services -->
        <section class="seeking-services">
            <div class="seeking-content">
                <h2>Seeking a <strong>full suite of services?</strong></h2>
                <p>Find a comprehensive graphic and design agency to handle it all.</p>
                <div class="service-tags">
                    <span>Visual Identity & Branding</span>
                    <span>Web & App Design</span>
                    <span>Marketing & Advertising</span>
                    <span>& more</span>
                </div>
                <button class="browse-btn">Browse agencies</button>
            </div>
            <div class="seeking-image">
                <img width="611" height="260" src="images/Graphic_Design_2x.webp" alt="Service Image">
            </div>
        </section>


        <!-- Explore Categories -->
        <section class="explore-section">
            <h2>Explore Graphics & Design</h2>
            <div class="explore-grid">
                <div class="explore-item">
                    <img src="https://images.unsplash.com/photo-1529612700005-e35377bf1415?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8TG9nbyUyMCUyNiUyMEJyYW5kJTIwSWRlbnRpdHl8ZW58MHx8MHx8fDA%3D" alt="Logo & Brand Identity">
                    <h3>Logo & Brand Identity</h3>
                    <p>Logo Design</p>
                    <p>Brand Style Guides
                    </p>
                    <p>Business Cards & Stationery
                    </p>
                    <p>Fonts & Typography
                    </p>
                </div>
                <div class="explore-item">
                    <img src="https://plus.unsplash.com/premium_photo-1721879243046-b0014907da1a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fFdlYiUyMCUyNiUyMEFwcCUyMERlc2lnbnxlbnwwfHwwfHx8MA%3D%3D" alt="Web & App Design">
                    <h3>Web & App Design</h3>
                    <p>Website Design</p>
                    <p>App Design</p>
                    <p>UX Design</p>
                    <p>Landing Page Design
                    </p>
                    <p>Icon Design

                    </p>
                </div>
                <div class="explore-item">
                    <img src="https://plus.unsplash.com/premium_photo-1681426758447-6b488b017f1e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8QXJ0JTIwJTI2JTIwSWxsdXN0cmF0aW9ufGVufDB8fDB8fHww" alt="Art & Illustration">
                    <h3>Art & Illustration</h3>
                    <p>Illustration</p>
                    <p>AI Artists
                    </p>
                    <p>AI Avatar Design</p>
                    <p>Children’s Book Illustration</p>
                    <p>Portraits & Caricatures</p>
                </div>
                <div class="explore-item">
                    <img src="https://images.unsplash.com/photo-1466837838619-c8f5b8f0c166?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8QXJjaGl0ZWN0dXJlJTIwJTI2JTIwQnVpbGRpbmclMjBEZXNpZ258ZW58MHx8MHx8fDA%3D" alt="Architecture & Building Design">
                    <h3>Architecture & Building Design</h3>
                    <p>Architecture & Interior Design</p>
                    <p>Landscape Design</p>
                    <p>Building Engineering
                    </p>
                    <p>Lighting DesignNew
                    </p>
                    <p>Building Information Modeling

                    </p>
                </div>
            </div>
            <br>
            <div class="explore-grid">
                <div class="explore-item">
                    <img src="https://images.unsplash.com/photo-1529612700005-e35377bf1415?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8TG9nbyUyMCUyNiUyMEJyYW5kJTIwSWRlbnRpdHl8ZW58MHx8MHx8fDA%3D" alt="Logo & Brand Identity">
                    <h3>Product & Gaming</h3>
                    <p>Logo Design</p>
                    <p>Brand Style Guides
                    </p>
                    <p>Business Cards & Stationery
                    </p>
                    <p>Fonts & Typography
                    </p>
                </div>
                <div class="explore-item">
                    <img src="https://plus.unsplash.com/premium_photo-1721879243046-b0014907da1a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fFdlYiUyMCUyNiUyMEFwcCUyMERlc2lnbnxlbnwwfHwwfHx8MA%3D%3D" alt="Web & App Design">
                    <h3>Visual Design</h3>
                    <p>Website Design</p>
                    <p>App Design</p>
                    <p>UX Design</p>
                    <p>Landing Page Design
                    </p>
                    <p>Icon Design

                    </p>
                </div>
                <div class="explore-item">
                    <img src="https://plus.unsplash.com/premium_photo-1681426758447-6b488b017f1e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8QXJ0JTIwJTI2JTIwSWxsdXN0cmF0aW9ufGVufDB8fDB8fHww" alt="Art & Illustration">
                    <h3>Print Design</h3>
                    <p>Illustration</p>
                    <p>AI Artists
                    </p>
                    <p>AI Avatar Design</p>
                    <p>Children’s Book Illustration</p>
                    <p>Portraits & Caricatures</p>
                </div>
                <div class="explore-item">
                    <img src="https://images.unsplash.com/photo-1466837838619-c8f5b8f0c166?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8QXJjaGl0ZWN0dXJlJTIwJTI2JTIwQnVpbGRpbmclMjBEZXNpZ258ZW58MHx8MHx8fDA%3D" alt="Architecture & Building Design">
                    <h3>Packaging & Covers</h3>
                    <p>Architecture & Interior Design</p>
                    <p>Landscape Design</p>
                    <p>Building Engineering
                    </p>
                    <p>Lighting DesignNew
                    </p>
                    <p>Building Information Modeling

                    </p>
                </div>
            </div>
        </section>


        <div class="accordion">
            <h2 class="graphic-design-headingfaq">Graphics & Design FAQs</h2>

            <div class="accordion__item">
                <div class="accordion__header" data-toggle="#faq1">What is graphic design?</div>
                <div class="accordion__content" id="faq1">
                    <p>Put simply, graphic design is the art and craft of creating visual content that communicates a concept, an idea or a brand message to the public. Logos, artworks, drawings, illustrations, cards, emails and a whole paraphernalia of designs are all around us. You can see them in print and digital media, in shops, restaurants and cafes, on billboards, books and magazines, in the apps we use, the sites we visit and the physical and digital products we buy. In fact, graphic design is a type of communication medium which uses visual means to convey a message. Designers use different types of physical materials or software to combine images, graphics and text as the main forms of expressing this message. Graphic design is used to sell, to build brand identity or to move people towards specific actions. It is also a form of art but ultimately, the different elements of the graphic representation influence our perceptions and emotions. There are different types of graphic design such as ‘visual identity’ which deals with the visual elements of the brand via shapes, colors and images (e.g. logo design, typography, brand style guides) and ‘marketing and advertising’ which is used directly to generate leads and sales via print (billboards, brochures, flyers, print ads) or digital (social media posts, banners, videos). There are many other types such as website design, industrial and product design, fashion design, book and illustrations, motion graphics design used for example by streamers or in gaming design and many others..</p>
                </div>
            </div>

            <div class="accordion__item">
                <div class="accordion__header" data-toggle="#faq2">How to hire top graphic designers?</div>
                <div class="accordion__content" id="faq2">
                    <p>A captivating visual presence is very important whether you’re a business or a non-commercial entity. Your potential audiences are already forming an opinion and deciding whether to interact with you based on what they see, long before you’ve had a chance to say or write something. So it’s imperative to carefully select the right freelancer to meet your needs and keep you within budget. There are many different areas in which graphic designers specialize so if you want to hire the right talent to meet the requirements of your particular project, here are some easy to follow tips and tricks. - Always research their portfolio on Fiverr and ask for more examples if necessary; - Carefully think about what your style and preferences are so you know what you like, what you don’t like and what you actually want (colors, graphics, images, etc); - Write a clear brief - depending on the size of the project your brief can be very short or contain a lot of detail. What’s important is to be clear on the important points; - Define a budget and be clear to yourself and the freelancer how far you can stretch it; - Form a clear agreement on deadlines and revisions and respect the work of the designer - if you are clear on the above points then there shouldn’t be any surprises; - Think long-term - a good designer will be able to help you holistically and develop an evolving long-term vision for your product or service.</p>

                </div>
            </div>

            <div class="accordion__item">
                <div class="accordion__header" data-toggle="#faq3">How much does it cost to hire a graphic designer</div>
                <div class="accordion__content" id="faq3">
                    <p>There is no simple answer to this question as graphic design is not a commodity or a product that has an exact way to be measured or priced. The great thing about Fiverr is that you can find a freelance graphic designer for any budget, starting from just $5 per gig and going up to hundreds or thousands of dollars for more complex and time and resource consuming requirements. However, there are a number of factors that will influence the final price of the project such as the level of experience of the seller (from novices to Top Rated and Pro Sellers), the number or service options included in the gig, delivery times, number of revisions and whether any extras might need to be added at some point. In fact, revisions can be a very tricky area for graphic design projects so it’s key for you to have very clear requirements to start with and also to agree with the seller what their output will be (e.g.how many initial versions they will offer) to avoid any misunderstandings or unwanted surprises on both sides. A more experienced designer will charge more, however, they can also help you define your requirements and save time (and money) in the long-run by keeping you on track for your goals. Alternatively, a new freelancer who’s perhaps less experienced or trying to build their reputation will be priced more competitively but might not have the skills or professional maturity of a seasoned creative director.</p>

                </div>
            </div>
            <div class="accordion__item">
                <div class="accordion__header" data-toggle="#faq4">How do I write a good creative design brief?</div>
                <div class="accordion__content" id="faq4">
                    <p>The creative brief is a key document that essentially defines the objectives, scope and key milestones of a design project. It gives the required information to the freelance graphic designer on what needs to be done, who the target audience will be, what key message(s) need to be communicated, what deliverables are expected, by when (deadlines and milestones). The creative brief is basically the blueprint that you’ll need to agree with your internal stakeholders, business partners or colleagues (or if you are a one-person-show - find a friend or someone you trust to use as a sounding board) and then present to the freelancer to guide, inspire them and ensure they deliver the best possible creative results. Here are some universal tips for writing a good creative brief that equally apply to most: - Start by answering the ‘what’ (your goal is) and ‘who’ (your audience is); - Be clear, concise and to the point - less is more in this case so avoid being too prescriptive and don’t elaborate too much; - Set realistic deadlines and factor in the time for feedback and revisions; - Ask for help - from your team, colleagues stakeholders; - Define what success will look like so both you and the designer can measure the results in the end (and stick to your initial definitions). Once you have all this, keep it as a template and use for future briefs as it’ll save you time and will ensure you can build long-term relationships with the graphic designers you work with.</p>

                </div>
            </div>
            <div class="accordion__item">
                <div class="accordion__header" data-toggle="#faq5">What’s the best way to hire a designer in less than 48 hours?</div>
                <div class="accordion__content" id="faq5">
                    <p>Finding a good graphic designer is very important for the way your business and brand is presented to your target audience so you need to be very careful in who you put your trust in. You will need to get to grips with some graphic design 101’s in order to become better at selection. Having said that, we know that sometimes there are business emergencies and you might find yourself in a situation when you need to hire a professional logo designer, illustration artist, front-end/UX or web designer or any type of freelance graphic designer in a hurry. The good news is that Fiverr can help you do that even if you only have 48 hours or less to complete your project. We have expert freelancers from around the globe, working 24/7 waiting to satisfy all your needs. Here’s what to do: - Publish a buyer request so you can reach a big audience of freelancers who can offer you their services; - Clearly state your requirements, your budget and your deadline and sellers will start to contact you immediately; - Make sure to follow through with offers and ask relevant questions about experience, how the freelancer will approach the project, expectations about time and milestones before you decide to place an order; - Read buyer reviews and ask for additional portfolio examples if not sure; - Look for the seller rating (Fiver Top Rated and Pro sellers will command higher prices but will have more experience and skills).</p>

                </div>
            </div>
            <div class="accordion__item">
                <div class="accordion__header" data-toggle="#faq6">What makes graphic design so important?</div>
                <div class="accordion__content" id="faq6">
                    <p>We live in a visual society so images, packaging, signage, illustrations, websites, apps and social media all vie for our attention, making it very challenging to become noticeable let alone memorable amongst the overload of visual stimuli. In a nutshell, the most important mission that graphic design plays is communication. Communication of ideas and messages, with the ultimate objective of elicit, prompt or evoke an action or an emotion (which will become an action in the future). So a good graphic designer will build your logo, create your email campaign or company stationery, do everything possible (given the right brief) to set you apart from your competition and convey a message that exudes trust, credibility and builds a consistent brand and company reputation. A well executed design project will ensure that the final output, be it a flyer or your product packaging, or even the design of your office space or your frontline staff’s uniforms summarizes your mission and vision statements and communicates in a clear and simple manner the main ideas that are behind your company or organization and what it stands for. When you hire a good graphic design professional, preferably one you can trust on more than one project, they will ensure that all representations of your products and brand are visually consistent, recognizable and conveying a clear message. Ultimately, when you ask yourself ‘How important is it that my customers recognize me?’, if the answer is ‘very important’ then so should graphic design be for your brand!</p>

                </div>
            </div>

        </div>


    </div>

    <script>
        // Following imports only used with bundlers!
        // import Swiper from "swiper";
        // import { Navigation, A11y } from 'swiper/modules';
        // import 'swiper/css';

        const swiper = new Swiper(".swiper", {
            // modules: [Navigation, A11y],
            direction: "horizontal",
            loop: false,
            navigation: {
                nextEl: ".c-carousel__button--next",
                prevEl: ".c-carousel__button--prev"
            },
            slidesPerView: "auto",
            spaceBetween: 58,
            a11y: {
                prevSlideMessage: "Previous slide",
                nextSlideMessage: "Next slide"
            }
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const togglers = document.querySelectorAll("[data-toggle]");

            togglers.forEach((btn) => {
                btn.addEventListener("click", (e) => {
                    const selector = e.currentTarget.dataset.toggle;
                    const block = document.querySelector(`${selector}`);
                    if (e.currentTarget.classList.contains("active")) {
                        block.style.maxHeight = "";
                    } else {
                        block.style.maxHeight = block.scrollHeight + "px";
                    }

                    e.currentTarget.classList.toggle("active");
                });
            });
        });
    </script>

    <?php require_once("includes/footer.php"); ?>
</body>


</html>