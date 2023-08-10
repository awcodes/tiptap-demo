import {
    $getRoot,
    createEditor,
    LineBreakNode,
    ParagraphNode,
    TextNode
} from "lexical";
import { registerPlainText } from "@lexical/plain-text";
import { ListNode, ListItemNode } from "@lexical/list";
import { LinkNode, AutoLinkNode } from "@lexical/link";
import { TableNode, TableCellNode, TableRowNode } from "@lexical/table";
import { OverflowNode } from "@lexical/overflow";
import { HeadingNode, QuoteNode } from "@lexical/rich-text";
import { MarkNode } from "@lexical/mark";
import { HashtagNode } from "@lexical/hashtag";
import { CodeHighlightNode, CodeNode } from "@lexical/code";
import {
    registerMarkdownShortcuts,
    TRANSFORMERS,
    $convertToMarkdownString
} from "@lexical/markdown";

function initPlainText(editor, initialEditorState) {
    return registerPlainText(editor);
}

function initMarkdownShortCuts(editor, transformers = TRANSFORMERS) {
    return registerMarkdownShortcuts(editor, transformers);
}

window.scribe = createEditor({
    onError: console.error,
    nodes: [
        LineBreakNode,
        ParagraphNode,
        TextNode,
        LinkNode,
        HeadingNode,
        QuoteNode,
        ListNode,
        ListItemNode,
        CodeHighlightNode,
        CodeNode,
        HashtagNode,
        MarkNode,
        OverflowNode,
        TableNode,
        TableCellNode,
        TableRowNode,
        AutoLinkNode
    ]
});

scribe.setRootElement(document.getElementById("editor"));

const registeredMarkdown = initMarkdownShortCuts(editor);
const registeredPlainText = initPlainText(editor);

scribe.registerUpdateListener(({ editorState }) => {
    editorState.read(() => {
        const toMarkdownString = $convertToMarkdownString(TRANSFORMERS);
        console.log(toMarkdownString);
        const root = $getRoot();
        console.log(root.getTextContent());
    });
});
