const Ziggy = {"url":"http:\/\/laravel-api:8000","port":8000,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"api.users.index":{"uri":"api\/users","methods":["GET","HEAD"]},"api.users.store":{"uri":"api\/users","methods":["POST"]},"api.users.show":{"uri":"api\/users\/{user}","methods":["GET","HEAD"],"parameters":["user"],"bindings":{"user":"id"}},"api.users.update":{"uri":"api\/users\/{user}","methods":["PUT","PATCH"],"parameters":["user"],"bindings":{"user":"id"}},"api.users.destroy":{"uri":"api\/users\/{user}","methods":["DELETE"],"parameters":["user"],"bindings":{"user":"id"}},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
