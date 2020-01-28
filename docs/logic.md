# Project logic

1. Libraries are connected through composer;
2. an instance of Handler is created;
3. Handler creates instances of Environment, Logic and User;
4. Environment loads data from .env;
5. Handler renders the page through Render;
6. Render processes the requested template and displays the page through Twig.
