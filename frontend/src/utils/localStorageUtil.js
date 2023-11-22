export const isBrowser = typeof window !== "undefined"
export const isServer = false
export const setItem = (key, value) =>  localStorage?.setItem(key, JSON.stringify(value))
export const getItem = (key) => {
    let res
    if (isBrowser) res = localStorage?.getItem(key)
    if (res === undefined || res === null) return null
    return JSON.parse(res)
}
export const removeItem = (key) =>  localStorage?.removeItem(key)
export const clear = _ =>  localStorage?.clear()
