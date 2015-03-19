# Merged PRs Script for PHP
Self executable script to determine merged PRs for your project.

Outputs to console and notify's slack if configured. Links to JIRA issues for your project as well.

Written in PHP since it's installed on all OSX machines by default. Also written procedurally to keep it extremely simple.

## Usage
Script can be used between any two hashes, tags, or branches

`./merged-prs <PREV> <NEW>`

Output will print to console as well as notify Slack if configured in config.json.
By default determines the diff between the previous two production tags `prod-` (as set in config).

If you wish to not notify slack, please pass `--test` as the first parameter

`./merged-prs --test <PREV> <NEW>`

### Example

```
$ ./merged-prs master master~2
Determining merged branches between the following hashes: master master~2

Merged PRs between the following hashes: master master~2
  #1875 (@chris): Fix CreateEncryptedFile for Keys layout (https://github.com/promiseofcake/web/pull/1875)
  #1877 (@anthony): updating the prod password as told by chef prod.json (https://github.com/promiseofcake/web/pull/1877)
  #1888 (@brandon): Fix copy paste journal title change (https://github.com/promiseofcake/web/pull/1888)
  #1890 (@brandon): update title on home page to reflect (https://github.com/promiseofcake/web/pull/1890)
  #1891 (@brandon): Fix text to download focus (https://issues.promiseofcake.co/browse/WEB-6793)
```

