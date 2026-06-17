export interface User {
    id: number;
    username: string;
}

export interface Credentials {
    username: string;
    password: string;
}

export interface NewUserCredentials extends Credentials {
    password_confirmation: string;
}