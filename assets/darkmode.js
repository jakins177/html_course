;(function() {
  function toggleTheme() {
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    updateToggleIcon(isDark);
  }

  function updateToggleIcon(isDark) {
    const btn = document.getElementById('dark-mode-toggle');
    if (btn) btn.textContent = isDark ? '☀️' : '🌙';
  }

  document.addEventListener('DOMContentLoaded', function() {
    const btn = document.createElement('button');
    btn.id = 'dark-mode-toggle';
    const saved = localStorage.getItem('theme');
    const isDark = saved === 'dark';
    if (isDark) document.documentElement.classList.add('dark');
    document.body.appendChild(btn); // Ensure the button exists first
    updateToggleIcon(isDark);       // Now it's safe to update the icon
    btn.addEventListener('click', toggleTheme);
  });
})();
