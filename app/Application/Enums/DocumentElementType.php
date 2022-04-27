<?php

namespace App\Enums;

enum DocumentElementType: string
{
    case Document = 'document';
    case Heading = 'heading';
    case Paragraph = 'paragraph';
    case ListItem = 'list-item';
    case Undefined = 'undefined';
}
