import ResourceIndex from './Pages/Resources/Index.vue';

Statamic.booting(() => {
    Statamic.$inertia.register('statamic-cp-resources::Index', ResourceIndex);
});

