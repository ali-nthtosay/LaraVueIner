import { filterForm } from './Filters.vue';

export const filter = () => {
filterForm.get(
'/listing',
{
preserveState: true,
preserveScroll: true,
}
);
};
