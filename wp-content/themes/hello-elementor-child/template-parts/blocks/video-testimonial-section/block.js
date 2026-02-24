(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initVideoTestimonialSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = 'true';

    try {
      var variant = section.dataset.variant || '1';

      initVideoPlayback(section);

      if (variant === '3') {
        if (typeof window.initSwiperInRoot === 'function') {
          window.initSwiperInRoot(section);
        }
      }
    } catch (error) {
      console.error('VideoTestimonialSection block init error:', error);
    }
  }

  /* ---
     VIDEO PLAYBACK — open modal with embedded video
  ---- */
  function initVideoPlayback(section) {
    var playBtns = section.querySelectorAll('.video-card-play-btn');
    playBtns.forEach(function (btn) {
      if (!btn || btn.dataset.jsBound) return;
      btn.dataset.jsBound = 'true';

      btn.addEventListener('click', function (e) {
        try {
          e.preventDefault();
          e.stopPropagation();
          var media = btn.closest('.video-card-media');
          if (!media) return;
          var videoUrl = media.dataset.videoUrl;
          if (!videoUrl) return;

          var embedUrl = getEmbedUrl(videoUrl);
          if (!embedUrl) {
            window.open(videoUrl, '_blank');
            return;
          }

          openVideoModal(section, embedUrl);
        } catch (err) {
          console.error('VideoTestimonialSection play click error:', err);
        }
      });
    });
  }

  function getEmbedUrl(url) {
    try {
      var ytMatch = url.match(/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
      if (ytMatch) return 'https://www.youtube.com/embed/' + ytMatch[1] + '?autoplay=1';

      var vimeoMatch = url.match(/vimeo\.com\/(?:video\/)?(\d+)/);
      if (vimeoMatch) return 'https://player.vimeo.com/video/' + vimeoMatch[1] + '?autoplay=1';

      if (url.match(/\.(mp4|webm|ogg)(\?|$)/i)) return null;

      return null;
    } catch (err) {
      return null;
    }
  }

  function openVideoModal(section, embedUrl) {
    var overlay = document.createElement('div');
    overlay.className = 'video-modal-overlay';
    overlay.innerHTML =
      '<button class="video-modal-close" aria-label="Close">&times;</button>' +
      '<iframe src="' + embedUrl + '" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';

    section.appendChild(overlay);

    var closeBtn = overlay.querySelector('.video-modal-close');
    function closeModal() {
      try {
        if (overlay.parentNode) overlay.parentNode.removeChild(overlay);
      } catch (err) {
        console.error('VideoTestimonialSection modal close error:', err);
      }
    }

    closeBtn.addEventListener('click', closeModal);
    overlay.addEventListener('click', function (e) {
      if (e.target === overlay) closeModal();
    });

    document.addEventListener('keydown', function onEsc(e) {
      if (e.key === 'Escape') {
        closeModal();
        document.removeEventListener('keydown', onEsc);
      }
    });
  }

  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllVideoTestimonialSections() {
    document.querySelectorAll('.video-testimonial-section-section')
      .forEach(function (section) {
        try {
          initVideoTestimonialSection(section);
        } catch (e) {
          console.error('VideoTestimonialSection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllVideoTestimonialSections();
      } catch (e) {
        console.error('VideoTestimonialSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW (must not break editor)
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=video-testimonial-section', function ($block) {
      try {
        if ($block && $block[0]) initVideoTestimonialSection($block[0]);
      } catch (e) {
        console.error('VideoTestimonialSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllVideoTestimonialSections();
    } catch (e) {
      console.error('VideoTestimonialSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();
