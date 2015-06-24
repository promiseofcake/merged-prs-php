# Merged PRs Script for PHP

Version: 2.0

Self executable script to determine merged PRs for your project.

Outputs to console and notify's slack if configured. Links to JIRA issues for your project as well.

Written in PHP since it's installed on all OSX machines by default. Also written procedurally to keep it extremely simple.

## Installation
In order to use the `merged-prs` tool it will need to exist in your `$PATH`.

* Clone the repo to a local path:

```
git clone git@github.com:promiseofcake/merged-prs-php.git
```

* Add the cloned path to your `$PATH` on a new shell or in your `.bashrc` or similar:

```
export PATH=$PATH:/path/to/merged-prs-php
```


## Usage
Script can be used within a Git repository between any two hashes, tags, or branches

`merged-prs <PREV> <NEW>`

Output will print to console as well as notify Slack if configured in `config/config-user.php`.
By default, determines the diff between the previous two production tags `prod-` (as set in config).

If you wish to not notify slack, please pass `--test` as the first parameter and it will only output to console.

`merged-prs --test <PREV> <NEW>`

### Example

```
$ merged-prs master master~2
Determining merged branches between the following hashes: master master~2

Merged PRs between the following hashes: master master~2
  #1875 (@chris): Fix CreateEncryptedFile for Keys layout (https://github.com/promiseofcake/web/pull/1875)
  #1877 (@anthony): updating the prod password as told by chef prod.json (https://github.com/promiseofcake/web/pull/1877)
  #1888 (@brandon): Fix copy paste journal title change (https://github.com/promiseofcake/web/pull/1888)
  #1890 (@brandon): update title on home page to reflect (https://github.com/promiseofcake/web/pull/1890)
  #1891 (@brandon): Fix text to download focus (https://issues.promiseofcake.co/browse/WEB-6793)
```

