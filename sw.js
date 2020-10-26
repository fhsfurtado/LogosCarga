var CACHE_NAME = 'static-v7';
self.addEventListener('install', function (event) {
  event.waitUntil(
    caches.open(CACHE_NAME).then(function (cache) {
      return cache.addAll([
        '/carga/',
        '/carga/index.php',
        '/carga/css/*.css',
        '/carga/js/.js',
        '/carga/manifest.js',
        '/carga/img/*',
        'carga/less/*',
        '/carga/express/express.php',
      ]);
    })
  )
});
self.addEventListener('activate', function activator(event) {
  event.waitUntil(
    caches.keys().then(function (keys) {
      return Promise.all(keys
        .filter(function (key) {
          return key.indexOf(CACHE_NAME) !== 0;
        })
        .map(function (key) {
          return caches.delete(key);
        })
      );
    })
  );
});
self.addEventListener('fetch', function (event) {
  event.respondWith(
    caches.match(event.request).then(function (cachedResponse) {
      return cachedResponse || fetch(event.request);
    })
  );
});