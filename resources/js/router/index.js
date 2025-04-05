import { createRouter, createWebHistory } from 'vue-router';
import PropertiesView from '../Pages/PropertiesView.vue';
import AddPropertyView from '../Pages/AddPropertyView.vue';
import ViewProperty from '../Pages/ViewProperty.vue';

const routes = [
  { path: '/properties', component: PropertiesView },
  { path: '/properties/create', component: AddPropertyView },
  { path: '/properties/:id', component: ViewProperty },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
