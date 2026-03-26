const cacheName = 'movement-event-cache-v1';
const assetsToCache = [
    '/',
    // '/css/app.css',
    // '/js/app.js',
];

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(cacheName)
            .then(cache => cache.addAll(assetsToCache))
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request)
              .then(response => response || fetch(event.request))
    );
});