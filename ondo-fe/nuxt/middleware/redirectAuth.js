// These helpers were copied from https://github.com/nuxt-community/auth-module/blob/dev/lib/core/utilities.js
// because it was easier than figuring out how to import them properly.
import { encodeQuery, routeOption, getMatchedComponents } from '../utils/nuxtjs-auth';

// NOTE: This is mostly a copy of the middleware from @nuxtjs/auth, however
// because we're using ctx.redirect and not $auth.redirect, this circumvents a
// number of features that library has to prevent infinite redirects and only
// redirect to known safe pages, so be very careful.
export default function isLoggedIn(ctx) {
    // Disable middleware if options: { auth: false } is set on the route
    if (routeOption(ctx.route, 'auth', false)) {
        return;
    }

    // Disable middleware if no route was matched to allow 404/error page
    const matches = [];
    const Components = getMatchedComponents(ctx.route, matches);
    if (!Components.length) {
        return;
    }

    // If we're not logged in, redirect to /login with
    if (!ctx.app.$auth.loggedIn) {
        ctx.redirect(ctx.app.localePath(`/${ctx.params.bu}/auth/login?${encodeQuery({ next: ctx.route.fullPath })}`));
    }
}
