<?php

namespace App\Enums;

enum DocumentElementType: string
{
    case Heading = 'heading';
    case Paragraph = 'paragraph';
    case ListItem = 'list-item';
    case Undefined = 'undefined';
}
