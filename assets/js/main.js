class PostService {
    static async getPosts() {
        try {
            const token = sessionStorage.getItem('token');
            const response = await fetch(`${API_POSTS}/posts`, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            });

            if (!response.ok) {
                throw new Error('Error al obtener los posts');
            }

            return await response.json();
        } catch (error) {
            throw error;
        }
    }

    static async createPost(title, content) {
        try {
            const token = sessionStorage.getItem('token');
            const user = JSON.parse(sessionStorage.getItem('user'));
            
            const response = await fetch(`${API_POSTS}/posts`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({
                    title,
                    content,
                    author_id: user.id
                })
            });

            if (!response.ok) {
                throw new Error('Error al crear el post');
            }

            return await response.json();
        } catch (error) {
            throw error;
        }
    }
}