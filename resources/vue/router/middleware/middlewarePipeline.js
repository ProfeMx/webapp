/**
 * Esta función implementa una tubería de middleware. En un pipeline de middleware, 
 * varias funciones middleware se encadenan juntas para procesar una solicitud o respuesta HTTP.
 * 
 * @param {Object} context - Un objeto que representa el estado de la solicitud o respuesta HTTP.
 * @param {Function[]} middleware - Un array de funciones middleware.
 * @param {Number} index - Un índice que representa la posición actual en el array de middleware.
 * @returns {Function} - La función `next` que fue pasada como parte del objeto `context`, o una función que ejecuta la siguiente función middleware en la tubería.
 */
function middlewarePipeline (context, middleware, index) {
    
// Obtenemos la siguiente función middleware a ejecutar en la tubería
    const nextMiddleware = middleware[index];

    // Si no hay más funciones middleware en el array, devolvemos la función `next` que fue pasada como parte del objeto `context`
    if (!nextMiddleware) {
        
        return context.next;

    }

    // Si hay más funciones middleware en el array, devolvemos una función que ejecuta la siguiente función middleware en la tubería
    return () => {

        // Obtenemos la siguiente función middleware en la tubería
        const nextPipeline = middlewarePipeline(context, middleware, index + 1);

        // Ejecutamos la siguiente función middleware en la tubería, pasándole el contexto y la función `next` para que pueda continuar la ejecución de la tubería
        nextMiddleware({ ...context, next: nextPipeline });

    };

}

// Exportamos la función `middlewarePipeline`
export default middlewarePipeline;