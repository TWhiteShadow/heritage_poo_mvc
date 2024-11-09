</main>
<footer>
    <div class="footer-content">
        <div>© 2024 Médiathèque. All rights reserved.</div>
    </div>
</footer>
</body>

</html>

<style>
    /* Footer */
    footer {
        background-color: #202632;
        padding: 1rem;
        text-align: center;
        margin-top: auto;
    }

    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .social-links a {
        margin: 0 0.5rem;
        text-decoration: none;
    }

    .social-links a:hover {
        color: var(--secondary-color);
    }
</style>

<script>
    addEventListener("DOMContentLoaded", (event) => {
        const images = document.querySelectorAll('.media-image');
        images.forEach((image) => {
            let imageTitle = image.getAttribute('alt');
            //make image src the first result of imageTitle search
            
        });
        console.log(images);

    });
    console.log('Hello from footer');

</script>