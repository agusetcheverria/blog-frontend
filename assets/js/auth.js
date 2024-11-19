class Auth {
    static async login(email, password) {
        try {
            const response = await fetch(`${API_USERS}/login`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email, password })
            });

            const data = await response.json();
            
            if (!response.ok) {
                throw new Error(data.message || 'Error en el inicio de sesión');
            }

            // Guardar token en sessionStorage
            sessionStorage.setItem('token', data.access_token);
            sessionStorage.setItem('user', JSON.stringify(data.user));

            return data;
        } catch (error) {
            throw error;
        }
    }

    static async register(name, email, password) {
        try {
            const response = await fetch(`${API_USERS}/register`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ name, email, password })
            });

            const data = await response.json();
            
            if (!response.ok) {
                throw new Error(data.message || 'Error en el registro');
            }

            return data;
        } catch (error) {
            throw error;
        }
    }

    static logout() {
        sessionStorage.removeItem('token');
        sessionStorage.removeItem('user');
        window.location.href = '/blog-frontend/pages/auth/login.php';
    }
}