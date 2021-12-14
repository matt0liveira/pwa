var CACHE_NAME = 'app-v1';
//Função para guardar arquivos no cachê
self.addEventListener('install', function (event) {
    event.waitUntil(
        caches.open(CACHE_NAME).then(function (cache) {
            return cache.addAll([
                'App/home.html',
                'App/doador/js/Home.js',
                'App/doador/js/doador.js',
                'App/comunidade/js/comunidade.js'
            ]);
        })
    )
});

//Função que irá atualizar a lista de arquivos em cachê
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