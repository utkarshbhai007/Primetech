(() => {
  const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  // 1. Page Loader curtain
  const loader = document.getElementById("page-loader");
  const loaderBar = document.getElementById("loader-bar");
  if (loader) {
    if (loaderBar) {
      requestAnimationFrame(() => {
        loaderBar.style.transition = "transform 0.95s cubic-bezier(0.22, 1, 0.36, 1)";
        loaderBar.style.transform = "translateX(0%)";
      });
    }
    setTimeout(() => {
      loader.style.transition = "clip-path 0.85s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.4s ease";
      loader.style.clipPath = "inset(0 0 100% 0)";
      setTimeout(() => loader.remove(), 900);
    }, 1150);
  }

  // 2. Lenis Smooth Scroll
  let lenis = null;
  if (!reducedMotion && typeof window.Lenis === "function") {
    lenis = new window.Lenis({
      duration: 1.15,
      easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
      smoothWheel: true,
    });
    window.__lenis = lenis;
    const raf = (t) => {
      lenis.raf(t);
      requestAnimationFrame(raf);
    };
    requestAnimationFrame(raf);
  }

  // Scroll to top buttons
  document.querySelectorAll("[data-scroll-top]").forEach((btn) => {
    btn.addEventListener("click", () => {
      if (window.__lenis) window.__lenis.scrollTo(0);
      else window.scrollTo({ top: 0, behavior: "smooth" });
    });
  });

  // 3. Header solid state, scroll progress & Back-to-top
  const header = document.getElementById("site-header");
  const headerCta = document.getElementById("header-cta");
  const logoWhite = header?.querySelector(".header-logo-white");
  const logoDark = header?.querySelector(".header-logo-dark");
  const megaMenu = document.getElementById("nav-products-megamenu");
  const megaChevron = header?.querySelector(".mega-chevron");
  const scrollProgress = document.getElementById("scroll-progress");
  const backToTop = document.getElementById("back-to-top");
  const backToTopRect = document.getElementById("back-to-top-rect");

  let megaOpen = false;
  const updateHeader = () => {
    const scrolled = window.scrollY > 40;
    const solid = scrolled || megaOpen;
    if (header) {
      header.classList.toggle("border-ink/10", solid);
      header.classList.toggle("bg-white/95", solid);
      header.classList.toggle("text-ink", solid);
      header.classList.toggle("backdrop-blur-md", solid);
      header.classList.toggle("border-white/10", !solid);
      header.classList.toggle("bg-transparent", !solid);
      header.classList.toggle("text-white", !solid);
    }
    if (logoWhite && logoDark) {
      logoWhite.classList.toggle("opacity-0", solid);
      logoWhite.classList.toggle("opacity-100", !solid);
      logoDark.classList.toggle("opacity-100", solid);
      logoDark.classList.toggle("opacity-0", !solid);
    }
    if (headerCta) {
      headerCta.classList.toggle("bg-brand", solid);
      headerCta.classList.toggle("text-white", solid);
      headerCta.classList.toggle("hover:bg-brand-dark", solid);
      headerCta.classList.toggle("bg-white", !solid);
      headerCta.classList.toggle("text-ink", !solid);
      headerCta.classList.toggle("hover:bg-brand", !solid);
      headerCta.classList.toggle("hover:text-white", !solid);
    }

    const maxScroll = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
    const pct = Math.min(1, Math.max(0, window.scrollY / maxScroll));
    if (scrollProgress) scrollProgress.style.transform = `scaleX(${pct})`;
    if (backToTop) {
      backToTop.classList.toggle("hidden", window.scrollY <= 600);
      backToTop.classList.toggle("grid", window.scrollY > 600);
    }
    if (backToTopRect) {
      backToTopRect.style.strokeDashoffset = String(184 * (1 - pct));
    }
  };
  updateHeader();
  window.addEventListener("scroll", updateHeader, { passive: true });

  // 4. Desktop Mega Menu
  let megaCloseTimer = null;
  const setMega = (open) => {
    if (megaOpen === open) return;
    megaOpen = open;
    clearTimeout(megaCloseTimer);
    if (megaMenu) {
      if (open) {
        megaMenu.classList.remove("hidden");
        megaMenu.style.opacity = "0";
        megaMenu.style.transform = "translateY(-12px)";
        requestAnimationFrame(() => {
          requestAnimationFrame(() => {
            megaMenu.style.transition = "opacity 0.35s cubic-bezier(0.22,1,0.36,1), transform 0.35s cubic-bezier(0.22,1,0.36,1)";
            megaMenu.style.opacity = "1";
            megaMenu.style.transform = "translateY(0)";
          });
        });
      } else {
        megaMenu.style.transition = "opacity 0.25s cubic-bezier(0.22,1,0.36,1), transform 0.25s cubic-bezier(0.22,1,0.36,1)";
        megaMenu.style.opacity = "0";
        megaMenu.style.transform = "translateY(-8px)";
        megaCloseTimer = setTimeout(() => {
          if (!megaOpen) megaMenu.classList.add("hidden");
        }, 260);
      }
    }
    if (megaChevron) megaChevron.classList.toggle("rotate-180", open);
    updateHeader();
  };
  header?.querySelectorAll("[data-mega-trigger]").forEach((el) => {
    el.addEventListener("mouseenter", () => setMega(true));
  });
  header?.querySelectorAll("[data-nav-plain]").forEach((el) => {
    el.addEventListener("mouseenter", () => setMega(false));
  });
  header?.addEventListener("mouseleave", () => setMega(false));

  const megaPreview = document.getElementById("mega-preview");
  const megaPreviewImg = document.getElementById("mega-preview-img");
  const megaPreviewTag = document.getElementById("mega-preview-tag");
  const megaPreviewName = document.getElementById("mega-preview-name");
  document.querySelectorAll("[data-mega-item]").forEach((item) => {
    item.addEventListener("mouseenter", () => {
      if (megaPreview) megaPreview.href = item.dataset.href || "#";
      if (megaPreviewImg && megaPreviewImg.getAttribute("src") !== (item.dataset.img || "")) {
        megaPreviewImg.style.transition = "none";
        megaPreviewImg.style.opacity = "0";
        megaPreviewImg.style.transform = "scale(0.94)";
        megaPreviewImg.src = item.dataset.img || "";
        megaPreviewImg.alt = item.dataset.name || "";
        requestAnimationFrame(() => {
          requestAnimationFrame(() => {
            megaPreviewImg.style.transition = "opacity 0.45s cubic-bezier(0.22,1,0.36,1), transform 0.45s cubic-bezier(0.22,1,0.36,1)";
            megaPreviewImg.style.opacity = "1";
            megaPreviewImg.style.transform = "scale(1)";
          });
        });
      }
      if (megaPreviewTag) megaPreviewTag.textContent = item.dataset.tag || "";
      if (megaPreviewName) megaPreviewName.textContent = item.dataset.name || "";
    });
  });

  // 5. Mobile Menu
  const mobileMenu = document.getElementById("mobile-menu");
  const mobileOpenBtn = document.getElementById("mobile-menu-open");
  const mobileCloseBtn = document.getElementById("mobile-menu-close");
  const mobileProdToggle = document.getElementById("mobile-products-toggle");
  const mobileProdPanel = document.getElementById("mobile-products-panel");
  const mobileProdPlus = mobileProdToggle?.querySelector(".mobile-products-plus");
  let mobileCloseTimer = null;
  let mobileProdOpen = false;

  mobileOpenBtn?.addEventListener("click", () => {
    if (!mobileMenu) return;
    clearTimeout(mobileCloseTimer);
    mobileMenu.classList.remove("hidden");
    mobileMenu.classList.add("flex");
    mobileMenu.style.clipPath = "inset(0 0 100% 0)";
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        mobileMenu.style.transition = "clip-path 0.6s cubic-bezier(0.22, 1, 0.36, 1)";
        mobileMenu.style.clipPath = "inset(0 0 0% 0)";
      });
    });
    window.__lenis?.stop();
  });
  mobileCloseBtn?.addEventListener("click", () => {
    if (!mobileMenu) return;
    mobileMenu.style.transition = "clip-path 0.6s cubic-bezier(0.22, 1, 0.36, 1)";
    mobileMenu.style.clipPath = "inset(0 0 100% 0)";
    mobileCloseTimer = setTimeout(() => {
      mobileMenu.classList.add("hidden");
      mobileMenu.classList.remove("flex");
    }, 600);
    window.__lenis?.start();
  });
  mobileProdToggle?.addEventListener("click", () => {
    if (!mobileProdPanel) return;
    mobileProdOpen = !mobileProdOpen;
    mobileProdPlus?.classList.toggle("rotate-45", mobileProdOpen);
    if (mobileProdOpen) {
      mobileProdPanel.style.height = "0px";
      mobileProdPanel.style.opacity = "0";
      requestAnimationFrame(() => {
        mobileProdPanel.style.transition = "height 0.4s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.3s ease";
        mobileProdPanel.style.height = mobileProdPanel.scrollHeight + "px";
        mobileProdPanel.style.opacity = "1";
      });
      setTimeout(() => {
        if (mobileProdOpen) mobileProdPanel.style.height = "auto";
      }, 410);
    } else {
      mobileProdPanel.style.height = mobileProdPanel.scrollHeight + "px";
      requestAnimationFrame(() => {
        mobileProdPanel.style.transition = "height 0.4s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.3s ease";
        mobileProdPanel.style.height = "0px";
        mobileProdPanel.style.opacity = "0";
      });
    }
  });

  // 6. Magnetic buttons & 3D Tilt images
  if (!reducedMotion && !window.matchMedia("(hover: none)").matches) {
    document.querySelectorAll("[data-magnetic]").forEach((wrap) => {
      wrap.style.transition = "transform 0.25s cubic-bezier(0.22, 1, 0.36, 1)";
      wrap.addEventListener("mousemove", (e) => {
        const r = wrap.getBoundingClientRect();
        const x = (e.clientX - r.left - r.width / 2) * 0.28;
        const y = (e.clientY - r.top - r.height / 2) * 0.28;
        wrap.style.transform = `translate3d(${x}px, ${y}px, 0)`;
      });
      wrap.addEventListener("mouseleave", () => {
        wrap.style.transform = "translate3d(0, 0, 0)";
      });
    });

    document.querySelectorAll("[data-tilt]").forEach((box) => {
      const target = box.querySelector(".tilt-target");
      if (!target) return;
      target.style.transition = "transform 0.35s cubic-bezier(0.22, 1, 0.36, 1)";
      box.addEventListener("mousemove", (e) => {
        const r = box.getBoundingClientRect();
        const mx = (e.clientX - r.left) / r.width - 0.5;
        const my = (e.clientY - r.top) / r.height - 0.5;
        target.style.transform = `rotateX(${-my * 14}deg) rotateY(${mx * 20}deg)`;
      });
      box.addEventListener("mouseleave", () => {
        target.style.transform = "rotateX(0deg) rotateY(0deg)";
      });
    });
  }

  // 7. Scroll Reveal, MaskLines, ClipImage, Counters & Parallax
  if (!reducedMotion && "IntersectionObserver" in window) {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-in");
          io.unobserve(entry.target);
        });
      },
      { threshold: 0.05 }
    );
    document.querySelectorAll("[data-reveal], [data-mask-lines]:not([data-mount]), [data-clip-image]").forEach((el) => io.observe(el));

    const counterIo = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          const el = entry.target;
          counterIo.unobserve(el);
          const target = Number(el.dataset.counter || "0");
          const format = el.dataset.format || "";
          const duration = 1800;
          const start = performance.now();
          const tick = (now) => {
            const t = Math.min(1, (now - start) / duration);
            const eased = 1 - Math.pow(1 - t, 3);
            const val = Math.round(target * eased);
            el.textContent = format === "indian" ? val.toLocaleString("en-IN") : val.toLocaleString("en-US");
            if (t < 1) requestAnimationFrame(tick);
          };
          requestAnimationFrame(tick);
        });
      },
      { threshold: 0.2 }
    );
    document.querySelectorAll("[data-counter]").forEach((el) => counterIo.observe(el));

    // Parallax for hero & sections
    const heroEl = document.getElementById("home-hero");
    const heroTextCol = document.getElementById("hero-text-col");
    const heroStageCol = document.getElementById("hero-stage-col");
    const parallaxEls = Array.from(document.querySelectorAll("[data-parallax]"));

    const updateParallax = () => {
      const vh = window.innerHeight || 900;
      if (heroEl && heroTextCol && heroStageCol) {
        const rect = heroEl.getBoundingClientRect();
        const prog = Math.min(1, Math.max(0, -rect.top / Math.max(1, rect.height)));
        heroTextCol.style.transform = `translate3d(0, ${-60 * prog}px, 0)`;
        heroTextCol.style.opacity = String(Math.max(0, 1 - prog / 0.7));
        heroStageCol.style.transform = `translate3d(0, ${140 * prog}px, 0)`;
      }
      parallaxEls.forEach((el) => {
        const offset = Number(el.dataset.parallax || "30");
        const rect = el.getBoundingClientRect();
        const total = vh + rect.height;
        const prog = Math.min(1, Math.max(0, (vh - rect.top) / Math.max(1, total)));
        const y = offset - 2 * offset * prog;
        el.style.transform = `translate3d(0, ${y}px, 0)`;
      });
    };
    updateParallax();
    window.addEventListener("scroll", () => requestAnimationFrame(updateParallax), { passive: true });
  } else {
    document.querySelectorAll("[data-reveal], [data-mask-lines], [data-clip-image]").forEach((el) => el.classList.add("is-in"));
  }
  document.querySelectorAll("[data-mask-lines][data-mount]").forEach((el) => {
    requestAnimationFrame(() => el.classList.add("is-in"));
  });

  // 8. Home Hero Slider
  const hero = document.getElementById("home-hero");
  if (hero && hero.dataset.heroSlides) {
    const slides = JSON.parse(hero.dataset.heroSlides);
    const DURATION = 6500;
    let idx = 0;
    let firstLoad = true;
    let timer = null;
    const headlineEl = document.getElementById("hero-headline");
    const subEl = document.getElementById("hero-sub");
    const machineWrap = document.getElementById("hero-machine-wrap");
    const imgEl = document.getElementById("hero-machine-img");
    const linkEl = document.getElementById("hero-machine-link");
    const tagEl = document.getElementById("hero-machine-tag");
    const nameEl = document.getElementById("hero-machine-name");
    const labelLeft = document.getElementById("hero-stage-label-left");
    const labelRight = document.getElementById("hero-stage-label-right");
    const slideBtns = hero.querySelectorAll("[data-hero-slide]");

    const renderSlide = (nextIdx, isInitial = false) => {
      idx = nextIdx;
      const s = slides[idx];
      const dur = idx === 0 && isInitial ? DURATION + 1200 : DURATION;

      if (!isInitial && headlineEl) {
        headlineEl.innerHTML = s.lines
          .map(
            (l, i) =>
              `<span class="block overflow-hidden pb-[0.22em] -mb-[0.14em]"><span class="block hero-line ${i === s.accent ? "text-brand" : ""}" style="animation-delay:${0.15 + i * 0.12}s">${l}</span></span>`
          )
          .join("");
      }
      if (!isInitial && subEl) {
        subEl.style.opacity = "0";
        subEl.style.transform = "translateY(10px)";
        setTimeout(() => {
          subEl.textContent = `${s.sub} Leading producer of plastic processing equipments in India since 1991.`;
          subEl.style.transition = "opacity 0.6s cubic-bezier(0.22,1,0.36,1), transform 0.6s cubic-bezier(0.22,1,0.36,1)";
          subEl.style.opacity = "1";
          subEl.style.transform = "translateY(0)";
        }, 140);
      }
      if (!isInitial && machineWrap && imgEl) {
        machineWrap.style.opacity = "0";
        machineWrap.style.transform = "translateX(-40px) scale(1.03)";
        setTimeout(() => {
          imgEl.src = s.img;
          imgEl.alt = s.name;
          const isHcm = s.slug === "high-speed-heater-cooler-mixer";
          imgEl.classList.toggle("max-h-[90%]", isHcm);
          imgEl.classList.toggle("max-w-[96%]", isHcm);
          imgEl.classList.toggle("max-h-[78%]", !isHcm);
          imgEl.classList.toggle("max-w-[82%]", !isHcm);
          machineWrap.style.transition = "none";
          machineWrap.style.transform = "translateX(40px) scale(0.95)";
          requestAnimationFrame(() => {
            requestAnimationFrame(() => {
              machineWrap.style.transition = "opacity 0.8s cubic-bezier(0.22,1,0.36,1), transform 0.8s cubic-bezier(0.22,1,0.36,1)";
              machineWrap.style.opacity = "1";
              machineWrap.style.transform = "translateX(0) scale(1)";
            });
          });
        }, 220);
      }
      if (linkEl) linkEl.href = s.href;
      if (tagEl) tagEl.textContent = s.tag;
      if (nameEl) nameEl.textContent = s.name;
      if (labelLeft) labelLeft.textContent = "";
      if (labelRight) labelRight.textContent = `${String(idx + 1).padStart(2, "0")} / 04`;

      slideBtns.forEach((btn, i) => {
        const active = i === idx;
        btn.querySelector(".hero-num")?.classList.toggle("text-white", active);
        btn.querySelector(".hero-num")?.classList.toggle("text-white/50", !active);
        btn.querySelector(".hero-label")?.classList.toggle("text-white", active);
        btn.querySelector(".hero-label")?.classList.toggle("text-white/55", !active);
        const bar = btn.querySelector(".hero-progress");
        if (bar) {
          bar.style.transition = "none";
          bar.style.width = "0%";
          if (active) {
            requestAnimationFrame(() => {
              requestAnimationFrame(() => {
                bar.style.transition = `width ${dur}ms linear`;
                bar.style.width = "100%";
              });
            });
          }
        }
      });

      clearTimeout(timer);
      timer = setTimeout(() => {
        firstLoad = false;
        renderSlide((idx + 1) % slides.length, false);
      }, dur);
    };

    slideBtns.forEach((btn, i) =>
      btn.addEventListener("click", () => {
        firstLoad = false;
        renderSlide(i, false);
      })
    );
    renderSlide(0, true);
  }

  const triggerPanelAnim = (el) => {
    if (!el) return;
    el.classList.remove("tab-panel-in");
    void el.offsetWidth;
    el.classList.add("tab-panel-in");
  };

  // 9. Home Product Category Tabs
  const homeTabs = document.querySelectorAll("[data-home-cat]");
  const homePanels = document.querySelectorAll("[data-home-panel]");
  homeTabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const cat = tab.dataset.homeCat;
      homeTabs.forEach((t) => {
        const active = t.dataset.homeCat === cat;
        t.setAttribute("aria-selected", active ? "true" : "false");
        t.classList.toggle("text-ink", active);
        t.classList.toggle("text-ink/50", !active);
        t.querySelector(".home-cat-line")?.classList.toggle("hidden", !active);
      });
      homePanels.forEach((p) => {
        const show = p.dataset.homePanel === cat;
        p.classList.toggle("hidden", !show);
        if (show) triggerPanelAnim(p);
      });
    });
  });

  homePanels.forEach((panel) => {
    const preview = panel.querySelector("[data-home-preview]");
    const previewImg = panel.querySelector("[data-preview-img]");
    const previewCode = panel.querySelector("[data-preview-code]");
    const previewTag = panel.querySelector("[data-preview-tag]");
    const previewName = panel.querySelector("[data-preview-name]");
    const previewShort = panel.querySelector("[data-preview-short]");
    const listItems = panel.querySelectorAll("[data-home-list-item]");

    listItems.forEach((item) => {
      const activate = () => {
        if (preview) preview.href = item.dataset.href || "#";
        if (previewCode) previewCode.textContent = item.dataset.code || "";
        if (previewTag) previewTag.textContent = item.dataset.tag || "";
        if (previewName) previewName.textContent = item.dataset.name || "";
        if (previewShort) previewShort.textContent = item.dataset.short || "";
        if (previewImg && previewImg.getAttribute("src") !== item.dataset.img) {
          previewImg.style.opacity = "0";
          previewImg.style.transform = "scale(0.95)";
          setTimeout(() => {
            previewImg.src = item.dataset.img || "";
            previewImg.alt = item.dataset.name || "";
            previewImg.style.opacity = "1";
            previewImg.style.transform = "scale(1)";
          }, 120);
        }
        listItems.forEach((other) => {
          const isCurrent = other === item;
          other.classList.toggle("bg-paper", isCurrent);
          other.classList.toggle("text-ink", isCurrent);
          other.classList.toggle("text-ink/80", !isCurrent);
          other.querySelector(".list-num")?.classList.toggle("text-brand", isCurrent);
          other.querySelector(".list-num")?.classList.toggle("text-ink/45", !isCurrent);
        });
      };
      item.addEventListener("mouseenter", activate);
      item.addEventListener("focus", activate);
    });
  });

  // 10. Products Page Category Tabs
  const prodTabs = document.querySelectorAll("[data-products-tab]");
  const prodGroups = document.querySelectorAll("[data-products-group]");
  prodTabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const cat = tab.dataset.productsTab;
      prodTabs.forEach((t) => {
        const active = t.dataset.productsTab === cat;
        t.setAttribute("aria-selected", active ? "true" : "false");
        t.classList.toggle("text-ink", active);
        t.classList.toggle("text-ink/50", !active);
        t.querySelector(".products-tab-line")?.classList.toggle("hidden", !active);
      });
      prodGroups.forEach((g) => {
        const show = cat === "all" || g.dataset.productsGroup === cat;
        g.classList.toggle("hidden", !show);
        if (show) triggerPanelAnim(g);
      });
      const url = new URL(window.location.href);
      if (cat === "all") url.searchParams.delete("category");
      else url.searchParams.set("category", cat);
      window.history.replaceState({}, "", url.toString());
    });
  });

  // 11. Infrastructure Page Unit Tabs
  const infraTabs = document.querySelectorAll("[data-infra-tab]");
  const infraUnits = document.querySelectorAll("[data-infra-unit]");
  infraTabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const id = tab.dataset.infraTab;
      infraTabs.forEach((t) => {
        const active = t.dataset.infraTab === id;
        t.setAttribute("aria-selected", active ? "true" : "false");
        t.classList.toggle("text-ink", active);
        t.classList.toggle("text-ink/50", !active);
        t.querySelector(".infra-tab-line")?.classList.toggle("hidden", !active);
      });
      infraUnits.forEach((u) => {
        const show = id === "all" || u.dataset.infraUnit === id;
        u.classList.toggle("hidden", !show);
        if (show) triggerPanelAnim(u);
      });
    });
  });

  // 12. Product Detail Smooth Jump & Gallery
  document.querySelectorAll("[data-jump-target]").forEach((btn) => {
    btn.addEventListener("click", () => {
      const el = document.getElementById(btn.dataset.jumpTarget);
      if (!el) return;
      if (window.__lenis) window.__lenis.scrollTo(el, { offset: -90 });
      else el.scrollIntoView({ behavior: "smooth" });
    });
  });

  const gallery = document.querySelector("[data-product-gallery]");
  if (gallery) {
    const mainBtn = document.getElementById("gallery-main-btn");
    const mainImg = document.getElementById("gallery-main-img");
    const thumbs = gallery.querySelectorAll("[data-gallery-thumb]");
    thumbs.forEach((thumb) => {
      thumb.addEventListener("click", () => {
        const idx = thumb.dataset.galleryThumb;
        const src = thumb.dataset.src;
        if (mainImg && src && mainImg.getAttribute("src") !== src) {
          mainImg.style.transition = "none";
          mainImg.style.opacity = "0";
          mainImg.style.transform = "scale(1.04)";
          mainImg.src = src;
          requestAnimationFrame(() => {
            requestAnimationFrame(() => {
              mainImg.style.transition = "opacity 0.6s cubic-bezier(0.22,1,0.36,1), transform 0.6s cubic-bezier(0.22,1,0.36,1)";
              mainImg.style.opacity = "1";
              mainImg.style.transform = "scale(1)";
            });
          });
        }
        if (mainBtn && idx !== undefined) mainBtn.dataset.lightboxIndex = idx;
        thumbs.forEach((t) => {
          const active = t === thumb;
          t.classList.toggle("border-brand", active);
          t.classList.toggle("border-ink/10", !active);
        });
      });
    });
  }

  // 13. Accordions
  const closeAccordionPanel = (panel) => {
    if (!panel || panel.style.height === "0px") return;
    panel.style.height = panel.scrollHeight + "px";
    requestAnimationFrame(() => {
      panel.style.transition = "height 0.45s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.35s ease";
      panel.style.height = "0px";
      panel.style.opacity = "0";
    });
  };
  const openAccordionPanel = (panel) => {
    if (!panel) return;
    panel.style.height = "0px";
    panel.style.opacity = "0";
    requestAnimationFrame(() => {
      panel.style.transition = "height 0.45s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.35s ease";
      panel.style.height = panel.scrollHeight + "px";
      panel.style.opacity = "1";
    });
    setTimeout(() => {
      if (panel.style.opacity === "1") panel.style.height = "auto";
    }, 460);
  };

  document.querySelectorAll("[data-accordion]").forEach((acc) => {
    const items = acc.querySelectorAll("[data-accordion-item]");
    items.forEach((item) => {
      const trigger = item.querySelector("[data-accordion-trigger]");
      const panel = item.querySelector("[data-accordion-panel]");
      const wrap = item.querySelector("[data-accordion-icon-wrap]");
      const svg = wrap?.querySelector("svg");
      trigger?.addEventListener("click", () => {
        const isOpen = trigger.getAttribute("aria-expanded") === "true";
        items.forEach((other) => {
          const ot = other.querySelector("[data-accordion-trigger]");
          if (ot?.getAttribute("aria-expanded") === "true") {
            ot.setAttribute("aria-expanded", "false");
            closeAccordionPanel(other.querySelector("[data-accordion-panel]"));
            const ow = other.querySelector("[data-accordion-icon-wrap]");
            ow?.classList.remove("border-brand", "bg-brand", "text-white");
            ow?.querySelector("svg")?.classList.remove("rotate-45");
          }
        });
        if (!isOpen) {
          trigger.setAttribute("aria-expanded", "true");
          openAccordionPanel(panel);
          wrap?.classList.add("border-brand", "bg-brand", "text-white");
          svg?.classList.add("rotate-45");
        }
      });
    });
  });

  // 14. Lightbox
  const lb = document.getElementById("lightbox");
  const lbFigure = document.getElementById("lightbox-figure");
  const lbImg = document.getElementById("lightbox-img");
  const lbCaption = document.getElementById("lightbox-caption");
  const lbCounter = document.getElementById("lightbox-counter");
  const lbPrev = document.getElementById("lightbox-prev");
  const lbNext = document.getElementById("lightbox-next");
  const lbClose = document.getElementById("lightbox-close");
  const lbBackdrop = document.getElementById("lightbox-backdrop");
  let lbItems = [];
  let lbIdx = -1;
  let lbCloseTimer = null;

  const renderLb = () => {
    if (!lb || lbIdx < 0 || !lbItems[lbIdx]) return;
    const item = lbItems[lbIdx];
    if (lbFigure) {
      lbFigure.style.transition = "none";
      lbFigure.style.opacity = "0";
      lbFigure.style.transform = "scale(0.97)";
    }
    if (lbImg) {
      lbImg.src = item.src;
      lbImg.alt = item.caption || "";
    }
    if (lbCaption) lbCaption.textContent = item.caption || "";
    if (lbCounter) lbCounter.textContent = `${String(lbIdx + 1).padStart(2, "0")} / ${String(lbItems.length).padStart(2, "0")}`;
    const multi = lbItems.length > 1;
    lbPrev?.classList.toggle("hidden", !multi);
    lbNext?.classList.toggle("hidden", !multi);
    if (lbFigure) {
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          lbFigure.style.transition = "opacity 0.45s cubic-bezier(0.22,1,0.36,1), transform 0.45s cubic-bezier(0.22,1,0.36,1)";
          lbFigure.style.opacity = "1";
          lbFigure.style.transform = "scale(1)";
        });
      });
    }
  };
  const closeLb = () => {
    lbIdx = -1;
    if (lb) {
      lb.style.transition = "opacity 0.3s ease";
      lb.style.opacity = "0";
      lbCloseTimer = setTimeout(() => {
        lb.classList.add("hidden");
        lb.classList.remove("flex");
      }, 300);
    }
    window.__lenis?.start();
  };
  const openLb = (items, index) => {
    clearTimeout(lbCloseTimer);
    lbItems = items;
    lbIdx = index;
    renderLb();
    if (lb) {
      lb.style.opacity = "0";
      lb.classList.remove("hidden");
      lb.classList.add("flex");
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          lb.style.transition = "opacity 0.3s ease";
          lb.style.opacity = "1";
        });
      });
    }
    window.__lenis?.stop();
  };

  document.querySelectorAll("[data-lightbox-group]").forEach((group) => {
    const items = JSON.parse(group.dataset.lightboxGroup || "[]");
    group.querySelectorAll("[data-lightbox-index]").forEach((btn) => {
      btn.addEventListener("click", () => {
        const idx = Number(btn.dataset.lightboxIndex || "0");
        openLb(items, idx);
      });
    });
  });
  lbClose?.addEventListener("click", closeLb);
  lbBackdrop?.addEventListener("click", (e) => {
    if (e.target === lbBackdrop) closeLb();
  });
  lbPrev?.addEventListener("click", (e) => {
    e.stopPropagation();
    lbIdx = (lbIdx - 1 + lbItems.length) % lbItems.length;
    renderLb();
  });
  lbNext?.addEventListener("click", (e) => {
    e.stopPropagation();
    lbIdx = (lbIdx + 1) % lbItems.length;
    renderLb();
  });
  window.addEventListener("keydown", (e) => {
    if (lbIdx < 0) return;
    if (e.key === "Escape") closeLb();
    if (e.key === "ArrowRight") {
      lbIdx = (lbIdx + 1) % lbItems.length;
      renderLb();
    }
    if (e.key === "ArrowLeft") {
      lbIdx = (lbIdx - 1 + lbItems.length) % lbItems.length;
      renderLb();
    }
  });

  // 15. Toast helper & Contact Enquiry Form
  const showToast = (msg, type = "error") => {
    const c = document.getElementById("toast-container");
    if (!c) return;
    const el = document.createElement("div");
    el.className = `pointer-events-auto border px-5 py-3 text-sm font-medium shadow-lg ${
      type === "error" ? "border-brand bg-ink text-white" : "border-ink/15 bg-white text-ink"
    }`;
    el.textContent = msg;
    c.appendChild(el);
    setTimeout(() => el.remove(), 4500);
  };

  const form = document.getElementById("enquiry-form");
  if (form) {
    const successBox = document.getElementById("enquiry-success");
    const successHeading = document.getElementById("enquiry-success-heading");
    const successProduct = document.getElementById("enquiry-success-product");
    const newBtn = document.getElementById("enquiry-new");
    const submitBtn = document.getElementById("enquiry-submit");
    const idleSpan = document.getElementById("enquiry-submit-idle");
    const sendingSpan = document.getElementById("enquiry-submit-sending");
    const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
    const phoneRe = /^[0-9+()\-\s.]{6,30}$/;

    const setFieldError = (field, msg) => {
      const errEl = form.querySelector(`[data-error-for="${field}"]`);
      const inputEl = form.querySelector(`[name="${field}"]`);
      if (errEl) {
        errEl.textContent = msg || "";
        errEl.classList.toggle("hidden", !msg);
      }
      if (inputEl) inputEl.setAttribute("aria-invalid", msg ? "true" : "false");
    };

    ["name", "company", "email", "phone", "country", "product", "message"].forEach((k) => {
      form.querySelector(`[name="${k}"]`)?.addEventListener("input", () => setFieldError(k, ""));
      form.querySelector(`[name="${k}"]`)?.addEventListener("change", () => setFieldError(k, ""));
    });

    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      const fd = new FormData(form);
      const payload = {
        name: String(fd.get("name") || "").trim(),
        company: String(fd.get("company") || "").trim(),
        email: String(fd.get("email") || "").trim(),
        phone: String(fd.get("phone") || "").trim(),
        country: String(fd.get("country") || "").trim(),
        product: String(fd.get("product") || "").trim(),
        message: String(fd.get("message") || "").trim(),
      };

      const errs = {};
      if (payload.name.length < 2) errs.name = "Please enter your full name.";
      if (!emailRe.test(payload.email)) errs.email = "Please enter a valid email address.";
      if (!phoneRe.test(payload.phone)) errs.phone = "Please enter a valid phone number.";
      if (!payload.country) errs.country = "Please select your country.";
      if (!payload.product) errs.product = "Please select a product.";
      if (payload.message.length < 10) errs.message = "Please describe your requirement (min. 10 characters).";

      Object.keys(payload).forEach((k) => setFieldError(k, errs[k] || ""));
      if (Object.keys(errs).length) return;

      if (submitBtn) submitBtn.disabled = true;
      idleSpan?.classList.add("hidden");
      sendingSpan?.classList.remove("hidden");

      try {
        const res = await fetch(form.getAttribute("action") || "/api/enquiries", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(payload),
        });
        if (!res.ok) {
          const data = await res.json().catch(() => null);
          if (res.status === 422 && data?.errors) {
            Object.entries(data.errors).forEach(([k, msg]) => setFieldError(k, msg));
            return;
          }
          throw new Error("Request failed");
        }
        form.classList.add("hidden");
        if (successHeading) successHeading.textContent = `Thank you, ${payload.name.split(" ")[0]}.`;
        if (successProduct) successProduct.textContent = payload.product;
        successBox?.classList.remove("hidden");
        triggerPanelAnim(successBox);
      } catch {
        showToast("Your enquiry could not be sent. Please try again or call us directly.");
      } finally {
        if (submitBtn) submitBtn.disabled = false;
        idleSpan?.classList.remove("hidden");
        sendingSpan?.classList.add("hidden");
      }
    });

    newBtn?.addEventListener("click", () => {
      form.reset();
      const countryEl = form.querySelector('[name="country"]');
      if (countryEl) countryEl.value = "India";
      successBox?.classList.add("hidden");
      form.classList.remove("hidden");
    });
  }
  // 16. Valued Clients Infinite Scroller with Prev/Next controls
  const clientsViewport = document.getElementById("clients-viewport");
  const clientsTrack = document.getElementById("clients-track");
  const clientsPrev = document.getElementById("clients-prev");
  const clientsNext = document.getElementById("clients-next");
  if (clientsViewport && clientsTrack) {
    let offset = 0;
    let paused = false;
    let lastTs = 0;
    const speed = 42; // px per second
    const halfWidth = () => clientsTrack.scrollWidth / 2;

    const wrapOffset = () => {
      const half = halfWidth();
      if (half <= 0) return;
      while (offset >= half) offset -= half;
      while (offset < 0) offset += half;
    };

    const tickClients = (ts) => {
      if (!lastTs) lastTs = ts;
      const dt = (ts - lastTs) / 1000;
      lastTs = ts;
      if (!paused && !reducedMotion) {
        offset += speed * dt;
        wrapOffset();
        clientsTrack.style.transform = `translate3d(${-offset}px, 0, 0)`;
      }
      requestAnimationFrame(tickClients);
    };
    requestAnimationFrame(tickClients);

    clientsViewport.addEventListener("mouseenter", () => { paused = true; });
    clientsViewport.addEventListener("mouseleave", () => { paused = false; });

    const nudge = (delta) => {
      offset += delta;
      wrapOffset();
      clientsTrack.style.transition = "transform 0.45s cubic-bezier(0.22, 1, 0.36, 1)";
      clientsTrack.style.transform = `translate3d(${-offset}px, 0, 0)`;
      setTimeout(() => { clientsTrack.style.transition = ""; }, 460);
    };
    clientsPrev?.addEventListener("click", () => nudge(-220));
    clientsNext?.addEventListener("click", () => nudge(220));
  }
})();
