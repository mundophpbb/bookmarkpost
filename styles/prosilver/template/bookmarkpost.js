(function () {
    'use strict';

    function initializeBookmarks() {
        // Place the bookmark action alongside the author and post date.
        document.querySelectorAll('.post .bookmarkpost-author-action').forEach(function (action) {
            var post = action.closest('.post');
            var author = post && post.querySelector('p.author');
            if (author) {
                author.appendChild(document.createTextNode(' '));
                author.appendChild(action);
            }
        });

        if (typeof phpbb === 'undefined' || typeof phpbb.addAjaxCallback !== 'function') {
            return;
        }

        phpbb.addAjaxCallback('mundophpbb.bookmarkpost', function (response) {
            var post = document.getElementById('p' + response.POST_ID);
            if (!post) {
                return;
            }

            var action = post.querySelector('.bookmarkpost');
            if (!action) {
                return;
            }

            action.setAttribute('href', response.NEW_HREF);
            action.setAttribute('title', response.NEW_LANG);
            action.setAttribute('aria-label', response.NEW_LANG);
            action.setAttribute('aria-pressed', response.NEW_COMMAND === 'unbookmark' ? 'true' : 'false');
            var accessibleLabel = action.querySelector('.sr-only');
            if (accessibleLabel) {
                accessibleLabel.textContent = response.NEW_LANG;
            }

            var bookmarked = response.NEW_COMMAND === 'unbookmark';
            var icon = action.querySelector('.icon');
            if (icon) {
                icon.classList.toggle('fa-star', bookmarked);
                icon.classList.toggle('fa-star-o', !bookmarked);
            }


        });
    }

    // Wait for phpBB scripts and the post markup before registering the callback.
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeBookmarks);
    } else {
        initializeBookmarks();
    }
}());
