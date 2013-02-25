echo "Setting up autocomplete for beanstalk commands..."
__beanstalk ( )
{
    local cur=${COMP_WORDS[COMP_CWORD]}

    local commands=$(cd /usr/local/lib/AWS-ElasticBeanstalk-CLI-2.1/api/bin/ && /bin/ls -1 $cur* 2>/dev/null)

    commands=$(echo "$commands" | grep elastic- | grep -v .cmd)

    [ -z "$commands" ] && return 1

    COMPREPLY=( $(echo "$commands" | xargs -n1 basename) )

    return 0
}
complete -F __beanstalk beanstalk
