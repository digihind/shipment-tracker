import './bootstrap';
import Alpine from 'alpinejs';
import collapse from "@alpinejs/collapse";
import anchor from "@alpinejs/anchor";

Alpine.plugin(collapse);
Alpine.plugin(anchor);

const modules = import.meta.glob("./plugins/**/*.js", { eager: true });
for (const path in modules) {
    Alpine.plugin(modules[path].default);
}

Alpine.start();
