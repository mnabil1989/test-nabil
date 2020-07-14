
export default function checkBuUrl(ctx) {

    if (ctx.params.bu != "hjh" && ctx.params.bu != "apc" && ctx.params.bu != "akw" && ctx.params.bu != "adc")
        ctx.redirect(ctx.app.localePath(`/`));

}
