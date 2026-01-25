<?php

/**
 * Template principal du thème CorbiDev Corbisier.
 * Affiche la grille de sites définis dans le fichier sites.json du thème.
 */

// Fichier JSON local au thème : wp-content/themes/wp-corbidev-corbisier-theme/sites.json
$sitesFile = get_template_directory() . '/sites.json';
$sites = [];

if (file_exists($sitesFile)) {
    $decoded = json_decode(file_get_contents($sitesFile), true);
    if (is_array($decoded)) {
        $sites = $decoded;
    }
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php bloginfo('name'); ?> — Hub personnel</title>

<script>
tailwind.config = {
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        brand: {
          bg: '#020617',
          card: '#020A1A',
          text: '#E5E7EB',
          muted: '#94A3B8',

          bgLight: '#EAF1FA',
          cardLight: '#DCE7F5',
          textLight: '#020617',
          mutedLight: '#475569',

          primary: '#2563EB',
          accent: '#38BDF8'
        }
      }
    }
  }
}
</script>

<style>
body::before{
  content:"";
  position:fixed;
  inset:0;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3'/%3E%3C/filter%3E%3Crect width='200' height='200' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
  pointer-events:none;
  z-index:0;
}
</style>
<?php wp_head(); ?>
</head>

<body <?php body_class('min-h-screen relative transition-colors duration-300 bg-gradient-to-b from-brand-bgLight to-white dark:bg-gradient-to-b dark:from-brand-bg dark:to-black text-brand-textLight dark:text-brand-text'); ?>>

<!-- LOGO -->
<header class="relative z-10 pt-8 pb-4 text-center">
  <img
    src="https://api-cv.corbisier.fr/wp-content/uploads/2025/12/logo_corbidev_large-e1766005728496.png"
    alt="CorbiDev"
    class="mx-auto h-24 sm:h-28"
  >
</header>

<!-- HERO -->
<section class="relative z-10 px-5 text-center mb-10">
  <h1 class="text-3xl sm:text-4xl font-extrabold mb-3">
    Mes projets &amp; services
  </h1>
  <p class="text-base sm:text-lg text-brand-mutedLight dark:text-brand-muted">
    Retrouvez ici l'ensemble de mes sites, outils et projets en ligne.
  </p>
</section>

<!-- CARDS -->
<main class="relative z-10 max-w-6xl mx-auto px-4 pb-20">
  <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">

<?php foreach ($sites as $site): ?>
<?php
  $url  = isset($site['lien']) ? htmlspecialchars($site['lien'], ENT_QUOTES, 'UTF-8') : '#';
  $ico  = isset($site['ico']) ? htmlspecialchars($site['ico'], ENT_QUOTES, 'UTF-8') : '';
  $name = isset($site['site']) ? htmlspecialchars($site['site'], ENT_QUOTES, 'UTF-8') : '';
  $desc = isset($site['description']) ? htmlspecialchars($site['description'], ENT_QUOTES, 'UTF-8') : '';
?>
<a href="<?php echo $url; ?>"
   target="_blank"
   class="group relative rounded-2xl p-[1px]
          bg-gradient-to-br from-brand-primary/40 to-brand-accent/40">

  <div class="relative h-full rounded-2xl p-4 sm:p-6 flex flex-col
              bg-gradient-to-b
              from-brand-cardLight to-white
              dark:from-slate-800 dark:to-slate-900
              border border-white/40 dark:border-white/10
              shadow-[0_6px_18px_-8px_rgba(37,99,235,0.35)]
              dark:shadow-[0_30px_60px_-25px_rgba(0,0,0,0.9)]
              transition-all duration-300
              active:scale-[0.97]
              sm:group-hover:-translate-y-1">

    <!-- Accent -->
    <div class="absolute inset-x-0 top-0 h-[3px] bg-gradient-to-r from-transparent via-brand-primary to-transparent"></div>

    <!-- Icon -->
    <div class="mb-3 flex justify-center">
      <div class="
        h-16 w-16 sm:h-20 sm:w-20 rounded-2xl
        flex items-center justify-center
        bg-gradient-to-br from-white to-sky-100
        dark:from-slate-700 dark:to-slate-800
        ring-1 ring-sky-300/60 dark:ring-white/20
        transition-transform duration-700
        group-hover:rotate-[12deg]
      ">
        <?php if ($ico): ?>
          <img src="<?php echo $ico; ?>" class="h-10 sm:h-12 w-auto" alt="">
        <?php endif; ?>
      </div>
    </div>

    <h3 class="text-sm sm:text-lg font-semibold text-center truncate">
      <?php echo $name; ?>
    </h3>

    <p class="mt-1 text-xs sm:text-sm text-center text-brand-mutedLight dark:text-brand-muted line-clamp-2">
      <?php echo $desc; ?>
    </p>

    <span class="mt-auto pt-3 text-xs sm:text-sm text-center font-semibold
                 text-brand-primary dark:text-brand-accent">
      Ouvrir &rarr;
    </span>

  </div>
</a>
<?php endforeach; ?>

  </div>
</main>


<!-- Footer avec dark mode toggle -->
<footer class="bg-gray-800 text-gray-200 border-t border-gray-700">
  <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col sm:flex-row justify-between items-center">
    <!-- Logo / Nom + Dark Mode -->
    <div class="flex items-center mb-2 sm:mb-0 gap-4">
      <h2 class="text-xl font-bold">MonSite</h2>
      <!-- Bouton sombre/clair -->
      <button id="theme-toggle" class="p-2 bg-gray-700 rounded hover:bg-gray-600 transition">🌙</button>
    </div>

    <!-- Liens -->
    <div class="flex flex-wrap justify-center sm:justify-start gap-4 text-sm">
      <a href="#" class="hover:text-white transition">Accueil</a>
      <a href="#" class="hover:text-white transition">À propos</a>
      <a href="#" class="hover:text-white transition">Services</a>
      <a href="#" class="hover:text-white transition">Contact</a>
    </div>

    <!-- Copyright -->
    <div class="mt-2 sm:mt-0 text-xs text-center sm:text-left">
      &copy; 2025 MonSite. Tous droits réservés.
    </div>
  </div>
</footer>

<script>
function setCookie(n,v,d=365){
  const t=new Date();
  t.setTime(t.getTime()+d*864e5);
  document.cookie=`${n}=${v};path=/;expires=${t.toUTCString()}`;
}
function getCookie(n){
  return document.cookie.split("; ")
    .find(r=>r.startsWith(n+"="))?.split("=")[1];
}

const root = document.documentElement;
const btn  = document.getElementById("theme-toggle");

function applyTheme(mode, animate=false){
  root.classList.toggle("dark", mode === "dark");
  if (btn) {
    btn.textContent = mode === "dark" ? "🌙" : "☀️";

    if (animate) {
      btn.classList.add("rotate-180");
      setTimeout(()=>btn.classList.remove("rotate-180"), 500);
    }
  }

  setCookie("theme", mode);
}

// init
const saved = getCookie("theme") || "dark";
applyTheme(saved);

// toggle
if (btn) {
  btn.onclick = () => {
    const isDark = root.classList.contains("dark");
    applyTheme(isDark ? "light" : "dark", true);
  };
}
</script>

<?php wp_footer(); ?>
</body>
</html>
