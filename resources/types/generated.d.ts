declare namespace App.Enums {
export type DocumentElementType = 'document' | 'heading' | 'paragraph' | 'list-item' | 'undefined';
}
declare namespace App.Models {
export type Document = {
incrementing: boolean;
preventsLazyLoading: boolean;
exists: boolean;
wasRecentlyCreated: boolean;
timestamps: boolean;
};
}
declare namespace Domain.DocumentProcessing.Services.Document {
export type DocumentElementLanguage = 'ru' | 'en';
export type DocumentElement = {
type: App.Enums.DocumentElementType;
uuid: string;
lang: Domain.DocumentProcessing.Services.Document.DocumentElementLanguage | null;
page: number | null;
text: string | null;
font: Domain.DocumentProcessing.Services.Document.DocumentElementFont | null;
children: any;
};
export type DocumentElementFont = {
family_name: string;
alt_family_name: string;
name: string;
size: number;
italic: boolean;
monospaced: boolean;
weight: number;
};
}
