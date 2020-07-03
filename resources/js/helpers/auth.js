/*start funcion que me devuelve el usuario de el local storage si es que existe*/
export function getLocalUser(){
	const userStr = localStorage.getItem("user");
	if (!userStr){
		return null;
	}
	return JSON.parse(userStr);
}
/*start funcion que me devuelve el usuario de el local storage si es que existe*/