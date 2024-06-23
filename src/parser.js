export function a2a(obj) {
    let alpineCtx = '{'
    Object.entries(obj).forEach(([key, value]) => {
        alpineCtx += `${key}: JSON.parse('${JSON.stringify(value)}'),`
    })

    console.log(alpineCtx + '}')

    return alpineCtx + '}'
}
