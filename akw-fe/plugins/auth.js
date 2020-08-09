export default async function ({ app }) {
  if (process.client) {
    console.log(app);
    if (!app.store.state.auth.loggedIn) {
      return
    }
    //   console.log(app.store.state.auth.loggedIn)
    // console.log('test')
    const auth = app.store.state.auth;
    const authStrategy = auth.strategy.name;
    if(authStrategy === 'facebook' || authStrategy === 'google'){
      const token = auth.getToken(authStrategy).substr(7)
      app.store.state.token = token;
      console.log(app.store.state.token);
      debugger;
      const authStrategyConverted = authStrategy === 'facebook' ? 'fb' : 'google';
      const url = `http://localhost:3000/register${authStrategyConverted}?token=${token}`;
      try {
        const {data} = await app.$axios.$post(url, null);
        auth.setToken('local', "Bearer "+ data.access_token);
        app.store.state.token = data.access_token;
        setTimeout( async () => {
          auth.setStrategy('local');
          setTimeout( async () => {
            await auth.fetchUser();
          })
        });
      } catch (e) {
        console.log(e);
      }
    }
  }
}
